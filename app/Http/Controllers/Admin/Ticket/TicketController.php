<?php

namespace Modules\Ticket\Http\Controllers\Admin;

use App\Events\TicketStoreEvent;
use App\Lubricator\AuthLubricator;
use App\Traits\ImageUploader;
use App\Utility\Acl;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Shop\CustomerOrder;
use App\Model\Ticket\Department;
use App\Model\Ticket\Ticket;
use App\Model\Ticket\TicketItem;
use Modules\Ticket\Http\Requests\TicketRequest;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    use ImageUploader;
    public function index()
    {

        $tickets = Ticket::latest()->get();
        return view('ticket::Admin.Tickets.list', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $departments = Department::latest()->where('status' , 1)->get();
        return view('ticket::Admin.Tickets.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(TicketRequest $request)
    {
        //

        $validatedData = $request->validate([

            'title' => ['string' , 'required' , 'max:255'],
            'department_id'  => ['numeric' , 'required'] ,
            'priority' => ['numeric' , 'required'] ,
            'body' => ['string' , 'required'] ,
            'image' => ['nullable', 'mimes:jpeg,png,jpg,gif,svg'],
            'file' => [ 'mimes:pdf,csv'] ,
        ]);

        DB::beginTransaction();
        $department_id = $request->input('department_id');
        Department::findOrFail($department_id);

        $ticket = Ticket::create([
            'title' => $request->input('title'),
            'department_id' => $department_id,
            'code' => 1,
            'to_id' => 1,
            'from_id' => auth()->id(),
            'priority' => $request->input('priority') ,
            'status' => 0,
        ]);





        if ($ticket instanceof Ticket) {

            $image = $this->imageUpload($request, 'image');
            $file = $this->fileUpload($request, 'file');

            $code = \Modules\Ticket\Utility\Ticket::codeGenerator($ticket->department_id , $ticket->from_id , $ticket->id);

            $ticket->update([
                'code' => $code
            ]);
            if ($ticket->save()){
                $ticket_item = TicketItem::create([
                    'ticket_id' => $ticket->id ,
                    'parent_id' => 0 ,
                    'from_id' => $ticket->from_id ,
                    'to_id' => $ticket->to_id ,
                     'body' => $request->input('body'),
                    'image' => $image,
                    'file' => $file
                ]);
                if ($ticket_item instanceof TicketItem){
                DB::commit();

                    \App\services\Watch::create_watches(true, null , $ticket_item);

                event(new TicketStoreEvent($ticket_item));
                    alert()->success('انجام شد', 'تیکت  با موفقیت ثبت شد!');
                    return redirect()->route('tickets.index');
                }
                else{
                    DB::rollBack();
                    alert()->error('خطا', 'هم اکنون امکان ثبت تیکت وجود ندارد!');
                    return redirect()->back();
                }
            }
            else{
                DB::rollBack();
                alert()->error('خطا', 'هم اکنون امکان ثبت تیکت وجود ندارد!');
                return redirect()->back();
            }


        }
        else{
            DB::rollBack();
            alert()->error('خطا', 'هم اکنون امکان ثبت تیکت وجود ندارد!');
            return redirect()->back();
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(Ticket $ticket)
    {
        \App\services\Watch::update_to_watched(auth()->id() , TicketItem::class);
        $ticket_items = TicketItem::where('ticket_id' , $ticket->id)->get();
        return view('ticket::Admin.Tickets.chat' , compact('ticket' , 'ticket_items'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $ticket = Ticket::where('id' , $id)->first();
        $departments = Department::latest()->where('status' , 1)->get();
        return view('ticket::Admin.Tickets.edit' , compact('ticket' , 'departments'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        DB::beginTransaction();
        $ticket = Ticket::findOrFail($id);
        $ticket->update([
            'title' => $request->input('title') ,
            'status' => $request->input('status') ,
            'priority' => $request->input('priority') ,
            'department_id' => $request->input('department_id') ,
        ]);
        if ($ticket->save()){
            DB::commit();
            alert()->success('انجام شد', 'تیکت  با موفقیت ویرایش شد!');
            return redirect()->route('tickets.index');
        }
        else{
            DB::rollBack();
            alert()->success(' خطا ', 'ویرایش تیکت با خطا مواجه شد!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $ticket = Ticket::findOrFail($id);
        $deletedCat = $ticket->delete();
        if ($ticket->trashed()) {
            alert()->success('انجام شد', ' تیکت  با موفقیت حذف شد!');
            return redirect()->route('tickets.index');
        } else {
            alert()->error('خطا', 'حذف  تیکت  با شکست مواجه شد!');
            return back();
        }
    }

    public function create_new(Request $request){

        $ticlet_id = $request->input('ticket_id');
        $ticket = Ticket::findOrFail($ticlet_id);
        //
        if (Acl::isManager(auth()->id()) ){
            $ticket->update([
                'status' => 1
            ]);
        }
        else{
            $ticket->update([
                'status' => 2
            ]);
        }

        $ticket->save();

        $ticket_item = TicketItem::create([
            'ticket_id' =>  $ticlet_id ,
            'parent_id' => 0 ,
            'from_id' => auth()->id() ,
            'to_id' =>  1,
            'body' => $request->input('body'),
            'image' => $request->input('image'),
            'file' => $request->input('file')
        ]);

        if($ticket_item instanceof TicketItem){
            event(new TicketStoreEvent($ticket_item));
            alert()->success('انجام شد', 'تیکت  با موفقیت ثبت شد!');
            return redirect()->route('tickets.index');
        }
    }


}
