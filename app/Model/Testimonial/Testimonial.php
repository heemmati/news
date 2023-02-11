

namespace App\Model\Testimonial;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Image\HasImage;

class Testimonial extends Model
{
    use SoftDeletes, HasUser, HasImage;

    protected $fillable = [
        'creator_id',
        'title',
        'post',
        'description',
        'status',
    ];
    protected $dates = ['deleted_at'];

}
