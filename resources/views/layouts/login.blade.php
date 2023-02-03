 <!-- login modal -->
 @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
             @endforeach
        </ul>
    </div>
@endif
 <div class="modal loginmodel fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">

                <div class="p-3">
                    
                
                 
                    <h5 class="modal-title text-center" id="exampleModalToggleLabel">@lang('index.login')</h5>
                 
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
         
                <div class="modal-body">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row g-4">
                            <div class="col-12">
                                <!-- <input type="email" class="form-control" id="inputEmail4" placeholder="Email"> -->
                                @lang('index.pemail') : <br>
                                <label for="email" :value="__('Email')" />

                                <input placeholder="" id="email" class="form-control" type="email" autocomplete="off" name="email" :value="old('email')" required autofocus />
                            </div>
                            <div class="col-12">
                                @lang('index.ppi') : <br>
                                <!-- <input type="password" class="form-control" id="inputPassword4" placeholder="Password"> -->
                                <label for="password" :value="__('Password')" />
                                <input placeholder="" id="password" class="form-control"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                            </div>
                        </div>
                        <div class="d-flex justify-content-center my-4 loginSigninBtn">
                            <button class="btn btn-primary btn-sm w-100" type="submit"><b>  @lang('index.login') </b></button>
                        </div>
                    </form>
                    
                        <div class="d-flex justify-content-between modalButtons">
                            <button data-bs-dismiss="modal" aria-label="Close" class="text-dark"
                                data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">@lang('index.signup')</button>


                            <button  data-bs-dismiss="modal" aria-label="Close" class="text-dark"
                            data-bs-target="#exampleModalToggle3" data-bs-toggle="modal" > @lang('index.forgetpass') ?</button>

                        </div>
                   

                </div>

                <div>
                </div>

            </div>
        </div>
    </div>


    <!-- registration modal -->
    <div class="modal loginmodel fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
        tabindex="-1">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                   <div class="w-100 text-center" >
                    <h5 class="modal-title" id="exampleModalToggleLabel2">@lang('index.signup')</h5>
                   </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="">
                        <ul class="tab-group">
                            <li class="tab active"><a href="#signup">@lang('index.user')</a></li>
                            <li class="tab"><a href="#login">@lang('index.Volunteer')</a></li>
                        </ul>

                        <div class="tab-content px-2">
                            <div id="signup">
                                <h3>@lang('index.signupforuser')</h3>
                             
                                <form method="POST" action="{{ route('register') }}">
                                     @csrf

                                    <div class="field-wrap">
                                        <label>
                                            @lang('index.loginname')<span class="req">*</span>
                                        </label>
                                        <!-- <input class="form-control"  type="name" required autocomplete="off" />

                                        <label for="name" :value="__('Name')" /> -->

                                        <input id="name" class="form-control" type="text" placeholder="@lang('index.lfullname')" autocomplete="off" name="name" :value="old('name')" required autofocus />
                                    </div>

                                    <div class="field-wrap">
                                        <label>
                                           @lang('index.lemail')<span class="req">*</span>
                                        </label>
                                        <!-- <input class="form-control"  type="email" required autocomplete="off" /> -->

                                        <input id="email" class="form-control" type="email" placeholder="@lang('index.lfullemail')" autocomplete="off" name="email" :value="old('email')" required />
                                    </div>

                                    <div class="field-wrap">
                                        <label>
                                           @lang('index.lphone')<span class="req">*</span>
                                        </label>
                                        <!-- <input class="form-control"  type="number" required autocomplete="off" /> -->

                                        <input id="phone" class="form-control" type="number" placeholder="@lang('index.lfullnumber')" autocomplete="off" name="phone" :value="old('phone')" required />
                                    </div>

                                    <div class="field-wrap">
                                        <label>
                                            @lang('index.lpassword')<span class="req">*</span>
                                        </label>
                                        <!-- <input class="form-control"  type="password" required autocomplete="off" /> -->

                                        <input id="password" class="form-control"
                                            type="password"
                                            name="password"
                                            placeholder="@lang('index.lpassdigit')"
                                            required autocomplete="new-password" />
                                    </div>
                                    <div class="field-wrap">
                                       
                                       <label>
                                        @lang('index.pcp') <span class="req">*</span>
                                       </label>
                                       <input id="password_confirmation" class="form-control"
                                                       type="password"
                                                       name="password_confirmation" required />
                                   </div>
                                   
                                    <input id="role" class="d-none" type="number" name="role" value="1" required />
                                    <button type="submit" class="button button-block" />  @lang('index.ragistration') </button>

                                </form>

                            </div>

                            <div id="login">
                                <h3> @lang('index.signupforvoluneteer')</h3>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('register') }}">
                                     @csrf

                                    <div class="field-wrap">
                                        <label>
                                            @lang('index.loginname') <span class="req">*</span>
                                        </label>
                                        <!-- <input class="form-control"  type="name" required autocomplete="off" />

                                        <label for="name" :value="__('Name')" /> -->

                                        <input id="name" class="form-control" type="text" placeholder="@lang('index.lfullname')" autocomplete="off" name="name" :value="old('name')" required autofocus />
                                    </div>

                                    <div class="field-wrap">
                                        <label>
                                            @lang('index.lemail')<span class="req">*</span>
                                        </label>
                                        <!-- <input class="form-control"  type="email" required autocomplete="off" /> -->

                                        <input id="email" class="form-control" type="email" placeholder="@lang('index.lfullemail')" autocomplete="off" name="email" :value="old('email')" required />
                                    </div>

                                    <div class="field-wrap">
                                        <label>
                                            @lang('index.lphone') <span class="req">*</span>
                                        </label>
                                        <!-- <input class="form-control"  type="number" required autocomplete="off" /> -->

                                        <input id="phone" class="form-control" type="number" placeholder="@lang('index.llfullnumber')" autocomplete="off" name="phone" :value="old('phone')" required />
                                    </div>

                                    <div class="field-wrap">
                                        <label>
                                            @lang('index.lpassword')<span class="req">*</span>
                                        </label>
                                        <!-- <input class="form-control"  type="password" required autocomplete="off" /> -->

                                        <input id="password" class="form-control"
                                            type="password"
                                            name="password" 
                                            placeholder="@lang('index.lpassdigit')" 
                                            required autocomplete="new-password" />
                                    </div>
                                    <div class="field-wrap">
                                       
                                        <label>
                                         @lang('index.pcp') <span class="req">*</span>
                                        </label>
                                        <input id="password_confirmation" class="form-control"
                                                        type="password"
                                                        name="password_confirmation" required />
                                    </div>


                                    <input id="role" class="d-none" type="number" name="role" value="2" required />
                                  <button type="submit" class="button button-block" />  @lang('index.ragistration') </button>

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modalButtons mt-2">
                        <button data-bs-dismiss="modal" aria-label="Close" class="" data-bs-target="#exampleModalToggle"
                            data-bs-toggle="modal">@lang('index.lalredylogin')</button>
                    </div>

                </div>
                
                
                 
            </div>
        </div>
    </div>


    {{-- forget password --}}

    <div class="modal loginmodel fade" id="exampleModalToggle3" aria-hidden="true" aria-labelledby="exampleModalToggleLabe3"
        tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">

                <div class="p-3">
                    
                
                 
                    <h5 class="modal-title text-center" id="exampleModalToggleLabe3">Forget Your Passsword?</h5>
                 
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
         
                <div class="modal-body">

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
            
                        <!-- Email Address -->
                        <div>
                            <x-label for="email" :value="__('Email')" />
            
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>
            
                        <div class="flex items-center justify-end mt-4">
                            <button class="btn btn-primary" >
                                {{ __('Email Password Reset Link') }}
                            </button>
                        </div>
                    </form>
                    
                     
                   

                </div>


            </div>
        </div>
    </div>

