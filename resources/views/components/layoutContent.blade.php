<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{$heading ?? 'Heading Belum Terisi'}}</h3>
                <p class="text-subtitle text-muted">{{$description ?? 'Description Belum Terisi'}}</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">{{$mainTitle ?? 'mainTitle Belum Terisi'}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$subTitle ?? 'subTitle Belum Terisi'}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <section class="row">
            {{$slot}}
        </section>
    </section>
</div>
