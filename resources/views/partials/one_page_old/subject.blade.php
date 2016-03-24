<section id="subjects" style="background-color: #e7e7e7">
    <div class="container inner">

        <div class="row">
            <div class="col-md-8 col-sm-9 center-block text-center">
                <header>
                    <h1>Browse Subjects</h1>
                </header>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row inner-top-sm">
            <div id="owl-latest-works" class="owl-carousel owl-item-gap">

                @foreach($subjects as $subject)
                    <div class="item">
                        <a href="{{ action('SubjectController@show',$subject->id) }}">
                            <figure>
                                <figcaption class="text-overlay">
                                    <div class="info">
                                        <h4>{{ ucfirst($subject->name) }}</h4>
                                    </div>
                                    <!-- /.info -->
                                </figcaption>
                                <div class="subject-icon">
                                    <img src="/images/lang/{{strtolower($subject->name)}}.jpg"/>
                                </div>
                            </figure>
                        </a>
                    </div>
                    <!-- /.item -->
                @endforeach
            </div>
            <!-- /.owl-carousel -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</section>