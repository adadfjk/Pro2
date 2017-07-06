        $(function () {
            //标志
            var flag = true ;
            //手机号码正则表达式
            var myreg = /^(((13[0-9]{1})|(14[0-9]{1})|(17[0]{1})|(15[0-3]{1})|(15[5-9]{1})|(18[0-9]{1}))+\d{8})$/;
            //密码正则表达式
            var codereg = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[~!@#$%^&*()_+`\-={}:";'<>?,.\/]).{6,18}$/;

            //手机号码验证
            $('#phone').blur(function () {
                if ($(this).val() == '') {
                    $(this).next().html('手机号码不能为空')
                } else if ($(this).val().length !== 11) {
                    $(this).next().html('请输入有效的手机号码')
                } else if (!myreg.test($(this).val())) {
                    $(this).next().html('请输入有效的手机号码')
                } else {
                    $.ajax({
                        url:'/checkPhone',
                        type:'get',
                        data:{'phone':$(this).val()},
                        success:function (data) {
                            if (data == 1) {
                                $('#phone').next().html('该手机号码已经被绑定')
                            } else {
                                $('#phone').next().html('该手机号码可用').css('color', 'green')
                                flag = false;
                            }
                        },
                        dataType:'json'
                    })
                }
            });
            $(':input').focus(function () {
                $(this).nextAll().filter('.tip').html('');
            });

            //密码验证
            $('#pass').blur(function () {
                if ($(this).val() == '') {
                    $(this).next().html('密码不能为空')
                } else if ($(this).val().length < 8) {
                    $(this).next().html('密码不能少于8位')
                } else if (!codereg.test($(this).val())) {
                    $(this).next().html('密码必须由数字,字母,特殊字符组成')
                } else {
                    $(this).next().html('密码格式正确').css('color', 'green')
                    flag = false;
                }
            });

            //确认密码验证
            $('#repass').blur(function () {
                if ($(this).val() == '') {
                    $(this).next().html('确认密码不能为空')
                }else if ($(this).val() !== $('#pass').val()) {
                    $(this).next().html('两次密码不一致')
                } else {
                    $(this).next().html('两次密码相同').css('color', 'green')
                    flag = false;
                }
            });

            //验证码验证
            $('#captcha').blur(function () {
                if ($(this).val() == '') {
                    $('#captchaMess').html('验证码不能为空')
                }else {
                    $.ajax({
                        url:'/checkCode',
                        type:'get',
                        data:{'code':$(this).val()},
                        success:function (data) {
                            if(data == 1) {
                                $('#captchaMess').html('验证码正确').css('color', 'green')
                                flag = false;
                            } else {
                                $('#captchaMess').html('验证码不正确')
                            }
                        },
                        dataType:'json'
                    })
                }

            });
            //发送短信验证
            $('#sendCodeBtn').click(function () {
                var s = 180;
                var timer;
                countdown();
                function countdown()
                {
                    $('#sendCodeBtn').html(s + 's后可重发').css('color', '#aaa');
                    s --
                    if (s < 0) {
                        clearTimeout(timer);
                        timer = null;
                        $('#sendCodeBtn').html('发送验证码').css('color', '#83CB01')
                    }
                }
                if (timer == null) {
                    timer = setInterval(countdown, 1000);
                }

            });

            //发送短信验证
            $('#sendCodeBtn').click(function () {
                $.ajax({
                    url:'/sendSms',
                    type:'get',
                    data:{'phone': $('#phone').val()},
                    success:function (data) {
                        if (data.status == 0) {
                            $('#smsMess').html(data.message).css('color', 'green')
                        } else {
                            $('#smsMess').html(data.message)
                        }
                    },
                    dataType:'json'
                })
            })

            //验证短信验证码
            $('#random_code').blur(function () {
                if ($(this).val() == '') {
                    $('#smsMess').html('验证码不能为空')
                }else {
                    $.ajax({
                        url:'/checkSms',
                        type:'get',
                        data:{'sms':$('#random_code').val()},
                        success:function (data) {
                            if(data == 1) {
                                $('#smsMess').html('验证码正确').css('color', 'green');
                                flag = false
                            } else {
                                $('#smsMess').html('验证码不正确').css('color', 'red')
                            }
                        },
                        dataType:'json'
                    })
                }
            })

            //图形验证码刷新
            $('#changeCaptchaImage').click(function () {
                host = window.location.host;
                url = "http://"+host +"/captcha?r=" +Math.floor(Math.random()*1000);
                document.getElementById('captchaImage').src = url;
            });

        })