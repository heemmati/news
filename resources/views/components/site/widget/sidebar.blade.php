<aside class="sidebar">
    <!--Search-->
    <div class="sidebar-widget search">
        <form>
            <input type="text" placeholder="جستجو ... ">
            <button class="sub-btn"><i class="fas fa-search"></i></button>
        </form>
    </div>
    <!--Recent Post-->



    <x-site.widget.recent :recent="$recent"></x-site.widget.recent>

    <x-site.widget.categories :categories="$categories"></x-site.widget.categories>
<!--Tags-->
    <x-site.widget.tags :tags="$tags"></x-site.widget.tags>
</aside>
