@extends('layouts.front.default')
@section('content')
    <div class="container">
        <ol class="breadcrumb">
          <li><a href="index_v_1.html">Home</a></li>
          <li class="active">About Us</li>
        </ol>
        <h2>We Are Rústica Mallorca Real Estate</h2>
        <p>Aenean quis sem nisi. Aliquam vehicula gravida orci, nec pretium mi ultricies in. Donec fermentum pulvinar mauris sed gravida. Pellentesque neque justo, commodo sed varius at, sagittis ut neque. In luctus pellentesque hendrerit. Vivamus congue laoreet urna, sed cursus odio scelerisque id. Curabitur volutpat pretium laoreet. Cras pulvinar vulputate porttitor. Ut sed lorem purus. Morbi posuere mauris odio, quis venenatis nisi viverra eu. Phasellus suscipit sem sapien. Phasellus risus purus, accumsan vel molestie vitae, sagittis sed massa. Sed elementum nisl tellus, at pharetra odio pharetra vel.</p>
        <div class="row">
          <div class="col-xs-6 txt-block">
            <h4>Lorem Ipsum Dolor</h4>
            <p>Aenean quis sem nisi. Aliquam vehicula gravida orci, nec pretium mi ultricies in. Donec fermentum pulvinar mauris sed gravida. Pellentesque neque justo, commodo sed varius at, sagittis ut neque. In luctus pellentesque hendrerit. Vivamus congue laoreet urna, sed cursus odio scelerisque id. </p>
          </div>
          <div class="col-xs-6 txt-block">
            <h4>Dolor Lorem Ipsum</h4>
            <p>Aenean quis sem nisi. Aliquam vehicula gravida orci, nec pretium mi ultricies in. Donec fermentum pulvinar mauris sed gravida. Pellentesque neque justo, commodo sed varius at, sagittis ut neque. In luctus pellentesque hendrerit. Vivamus congue laoreet urna, sed cursus odio scelerisque id. </p>
          </div>
        </div>
        <h3>Our Team</h3>
        <p class="team-color">Lorem Ipsum is simply dummy text of the printing and</p>
        <div class="row">
          <div class="col-xs-6 txt-block">
            <div class="circle">
              <a href="agent_profile.html">
                <img src="http://placehold.it/162x162" alt="">
              </a>
            </div>
            <div class="team-info col-sm-6 col-xs-12">
              <h3>Sara Strawberry</h3>
              <p class="team-color">4 Property</p> 
              <hr class="separate">
              <p id="phone"><i class="fa fa-phone"></i><a href="tel:+4819228383746">+48 192 28383746</a></p>
              <p><i class="fa fa-skype"></i><a href="skype:SkypeUser">sara_straw</a></p>
            </div>
          </div>
          <div class="col-xs-6 txt-block">
            <div class="circle">
              <a href="agent_profile.html">
                <img src="http://placehold.it/162x162" alt="">
              </a>
            </div>
            <div class="team-info col-sm-6 col-xs-12">
              <h3>Sara Genergy</h3>
              <p class="team-color">4 Property</p> 
              <hr class="separate">
              <p id="phone2"><i class="fa fa-phone"></i><a href="tel:+4819228383746">+48 192 28383746</a></p>
              <p><i class="fa fa-skype"></i><a href="skype:SkypeUser">s_genergy</a></p>
            </div>
          </div>
        </div>
      </div>
      <div id="fun-facts" class="block counting-numbers">
        <div class="container">
          <div class="row">
            <div class="fun-facts col-md-12">
              <div class="col-sm-3  underline">
                <div class="number-wrapper col-sm-12">
                  <div class="number" data-from="1" data-to="136">136</div>
                  <figure>Properties Listed</figure>
                </div><!-- /.number-wrapper -->
              </div><!-- /.col-md-3 col-sm-3 underline -->
              <div class="col-md-3 col-sm-3 underline">
                <div class="number-wrapper col-sm-12">
                  <div class="number" data-from="1" data-to="2145">2145</div>
                  <figure>Satisfied Clients</figure>
                </div><!-- /.number-wrapper -->
              </div><!-- /.col-md-3 col-sm-3 underline -->
              <div class="col-md-3 col-sm-3 underline">
                <div class="number-wrapper col-sm-12">
                  <div class="number" data-from="1" data-to="468">468</div>
                  <figure>Properties Sold</figure>
                </div><!-- /.number-wrapper -->
              </div><!-- /.col-md-3 col-sm-3 underline -->
              <div class="col-md-3 col-sm-3 underline">
                <div class="number-wrapper col-sm-12">
                  <div class="number" data-from="1" data-to="5475">5475</div>
                  <figure>Day we are here</figure>
                </div><!-- /.number-wrapper -->
              </div><!-- /.col-md-3 col-sm-3 underline -->
            </div><!-- /.fun-facts -->
          </div><!-- /.row -->
        </div>
      </div>
      <div class="container">
        <section class="block testimonials">
          <header class="center">
            <h2 class="no-border">We love Rústica Mallorca Work!</h2>
          </header>
          <div class="owl-carousel testimonials-carousel">
            <blockquote class="item">
              <aside class="cite">
                <p class="team-color">"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled"</p>
              </aside>
              <figure>
                <div class="image">
                  <img src="http://placehold.it/55X55" alt="">
                </div>
                <p>Johan Nordquist</p>
                <p class="team-color">Someone From Company</p>
              </figure>
            </blockquote>
            <blockquote class="item">
              <aside class="cite">
                <p class="team-color">"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled"</p>
              </aside>
              <figure>
                <div class="image">
                  <img src="http://placehold.it/55X55" alt="">
                </div>
                <p>Sara Genergy</p>
                <p class="team-color">Someone From Company</p>
              </figure>
            </blockquote>
            <blockquote class="item">
              <aside class="cite">
                <p class="team-color">"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled"</p>
              </aside>
              <figure>
                <div class="image">
                  <img src="http://placehold.it/55X55" alt="">
                </div>
                <p>Sara Strawberry</p>
                <p class="team-color">Someone From Company</p>
              </figure>
            </blockquote>
          </div><!-- /.testimonials-carousel -->
        </section><!-- /#testimonials -->
      </div>
@stop

@section('scripts')
   
@stop