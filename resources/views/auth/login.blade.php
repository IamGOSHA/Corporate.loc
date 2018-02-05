@extends(env('THEME').'.layouts.site')
@section('content')
                           @if(count($errors) > 0)
                       <div class="error-box box">
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                       </div>
                       @endif
                         @if(session('status'))
                       <div class="success-box box">

                            <p>{{session('status')}}</p>
                       </div>
                       @endif
                        <!-- START CONTENT -->
                        <div id="content-page" class="content group">
                            <div class="hentry group">
                                <form id="contact-form-contact-us" class="contact-form" method="post" action="{{url('auth/login')}}" enctype="multipart/form-data">
                                    <div class="usermessagea"></div>
                                    {{csrf_field()}}
                                    <fieldset>
                                        <ul>
                                            <li class="text-field">
                                                <label for="login">
                                                <span class="label">имя</span>
                                                <br />                  <span class="sublabel">This is the name</span><br />
                                                </label>
                                                <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span><input type="text" name="login" id="login" class="required" value="" /></div>
                                                <div class="msg-error"></div>
                                            </li>
                                            <li class="text-field">
                                                <label for="password">
                                                <span class="label">пароль</span>
                                                <br />                  <span class="sublabel">This is a field password</span><br />
                                                </label>
                                                <div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i></span><input type="password" name="password" id="password" class="required email-validate" value="" /></div>
                                                <div class="msg-error"></div>
                                            </li>

                                            <li class="submit-button">
                                                <input type="text" name="yit_bot" id="yit_bot" />
                                                <input type="hidden" name="yit_action" value="sendmail" id="yit_action" />
                                                <input type="hidden" name="yit_referer" value="http://yourinspirationtheme.com/demo/pinkrio/corporate/contact/" />
                                                <input type="hidden" name="id_form" value="126" />
                                                <input type="submit" name="yit_sendmail" value="login" class="sendmail alignright" />            
                                            </li>
                                        </ul>
                                    </fieldset>
                                </form>
                                <script type="text/javascript">
                                    var messages_form_126 = {
                                        name: "Please, fill in your name",
                                        email: "Please, insert a valid email address",
                                        message: "Please, insert your message"
                                    };
                                </script>
                            </div>
                            <!-- START COMMENTS -->
                            <div id="comments">
                            </div>
                            <!-- END COMMENTS -->
                        </div>
@endsection
