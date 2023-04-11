@include('theme/login-theme')
<div class="portal">
    <div class="portal__wrapper">
        <form action="#" class="portal__wrapper__form">
            <div class="portal__wrapper__form__wrapper">
                <div class="portal__wrapper__form__wrapper__title">
                    <h1>Waiting for Approval</h1><br>
                    <p>Your account is waiting for our administrator approval.
                        Please check back later.</p>

                        <div class="back-to">
                            <p id="terms">Back to <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log in</a>.</p>
                        </div>
                        
                </div>
            </div>
        </form>
        </form>
    </div>
</div>  

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>