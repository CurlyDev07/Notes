  <!-- Sidebar Widgets Column -->
  <div class="col-md-4">

    <!-- Search Widget -->
    <div class="card my-4">
        <h5 class="card-header">Search</h5>
        <div class="card-body">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
            <button class="btn btn-secondary" type="button">Go!</button>
            </span>
        </div>
        </div>
    </div>

    <!-- Categories Widget -->
    <div class="card my-4">
        <h5 class="card-header">Categories</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 d-flex justify-content-center">
                    <ul class="list-unstyled mb-0">
                        @foreach ($filter_cat = App\Category::filter_cat() as $filter_cat)
                            <li>
                                <a href="/?category={{ $filter_cat->id }}">{{ $filter_cat->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Side Widget -->
    <div class="card my-4">
        <h5 class="card-header">Archives</h5>
        <div class="card-body">
            <div class="col-sm-12 d-flex justify-content-center">
                <ul class="list-unstyled mb-0">
                    @foreach ($filter_dates = App\Post::filter(); as $filter_date)
                        <li>
                            <a href="/?month={{ $filter_date->month }}&year={{ $filter_date->year }}">
                                {{ $filter_date->month }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>