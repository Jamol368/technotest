<hr>
<footer class="site-footer bg-white pb-0 mt-auto border-top shadow-lg">
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-5">
                        <img src="{{ asset('/app/images/logo.svg') }}" alt="logo" class="footer-heading mb-4" />
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem modi, quaerat laborum id fugit blanditiis ratione delectus assumenda.</p>

                    </div>
                    <div class="col-md-5 ml-auto">
                        <h2 class="footer-heading mb-4">{{ trans('messages.pages') }}</h2>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('home') }}">{{ trans('messages.home') }}</a></li>
                            <li><a href="{{ route('home') }}/#test">Test</a></li>
                            <li><a href="{{ route('textbooks') }}">{{ trans('messages.textbooks') }}</a></li>
                            <li><a href="{{ route('blog.index') }}">{{ trans('messages.announcements') }}</a></li>
                            <li><a href="#">{{ trans('messages.about_us') }}</a></li>
                            <li><a href="https://t.me/Ruzmetova_Shirin" target="_blank">{{ trans('messages.contact') }}</a></li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-md-3 ml-auto">
                <h2 class="footer-heading mb-4">{{ trans('messages.contact') }}</h2>
                <a href="https://t.me/Ruzmetova_Shirin" target="_blank" class="smoothscroll pl-0 pr-3"><span class="icon-send"></span></a>
                <a href="https://t.me/DildoraRoziqova" target="_blank" class="smoothscroll pl-0 pr-3"><span class="icon-send"></span></a>
            </div>
        </div>
    </div>
    <div class="text-center text-white bg-blue">
        <div class="pt-4 pb-2">
            <p class="text-white">
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by <a href="{{ route('home') }}" target="_blank" class="text-white btn-link" >Technotest.uz</a>
            </p>
        </div>
    </div>
</footer>
