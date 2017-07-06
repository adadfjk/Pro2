$(function () {
            //验证码验证
            $('#captcha').blur(function () {
                if ($(this).val() == '') {
                    $('#captchaMess').html('验证码不能为空')
                }else {
                    console.log(11);
                    $.ajax({
                        url:'/checkCode',
                        type:'get',
                        data:{'code':$(this).val()},
                        success:function (data) {
                            if(data == 1) {
                                $('#captchaMess').html('验证码正确').css('color', 'green')
                            } else {
                                $('#captchaMess').html('验证码不正确')
                            }
                        },
                        dataType:'json'
                    })
                }

            });

            $(':input').focus(function () {
                $(this).nextAll().filter('.tip').html('');
            });

            //手机号码验证
            $('#phone').blur(function () {
                if ($(this).val() == '') {
                    $(this).next().html('手机号码不能为空')
                } else {
                    $.ajax({
                        url:'/checkPhone',
                        type:'get',
                        data:{'phone':$(this).val()},
                        success:function (data) {
                            if (data == 1) {
                                $('#phone').next().html('用户存在').css('color', 'green')
                            } else {
                                $('#phone').next().html('该用户不存在')
                            }
                        },
                        dataType:'json'
                    })
                }
            });

            //密码验证
            $('#pass').blur(function () {
                if ($(this).val() == '') {
                    $(this).next().html('密码不能为空')
                } else {
                    $.ajax({
                        url:'/checkPass',
                        type:'get',
                        data:{'phone':$('#phone').val(),'password':$('#pass').val()},
                        success:function (data) {
                            if (data == 1) {
                                $('#pass').next().html('密码正确').css('color', 'green')
                            } else {
                                $('#pass').next().html('密码不正确')
                            }
                        },
                        dataType:'json'
                    })
                }
            });

            //图形验证码刷新
            $('#changeCaptchaImage').click(function () {
                host = window.location.host;
                url = "http://"+host +"/captcha?r=" +Math.floor(Math.random()*1000);
                document.getElementById('captchaImage').src = url;


            });


            
});