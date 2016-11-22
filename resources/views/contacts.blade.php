@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row-fluid">
            <div class="span8">
                <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.uk/maps?f=q&source=s_q&hl=en&geocode=&q=10+Rue+de+Rome&sll=48.874650,2.325336&ie=UTF8&hq=&hnear=10+RUE+DE+ROME,+75008,+FRANCE&t=m&z=17&ll=48.875350,2.325336&output=embed"></iframe>
            </div>

            <div class="span4">
                <h2>Snail mail</h2>
                <address>
                    <strong>Hythe Window Cleaning</strong><br>
                    15 Springfield Way<br>
                    Hythe<br>
                    Kent<br>
                    United Kingdon<br>
                    CT21 5SH<br>
                    <abbr title="Phone">P:</abbr> 01234 567 890
                </address>
            </div>
        </div>
    </div>


    <address>
        <strong>Twitter, Inc.</strong><br>
        1355 Market Street, Suite 900<br>
        San Francisco, CA 94103<br>
        <abbr title="Phone">P:</abbr> (123) 456-7890
    </address>

    <address>
        <strong>Full Name</strong><br>
        <a href="mailto:#">first.last@example.com</a>
    </address>


@endsection
