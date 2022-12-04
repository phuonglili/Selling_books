
function drd()
{
    document.querySelector('.sign-in').classList.add('animate__backOutDown')
    document.querySelector('.sign-in').classList.remove('animate__bounceInDown')
}
function ofc(x) {
    add_animate(x)
}
function add_animate(x)
{
    x.parentNode.querySelector('h5').classList.add('animate__animated', 'animate__headShake','animate__slow','2s','animate__infinite','infinite');
}
function remove_animate(x)
{
    x.parentNode.querySelector('h5').classList.remove('animate__animated', 'animate__headShake','animate__slow','2s','animate__infinite','infinite');
}
function remove_invalid(x)
{
    x.parentNode.querySelector('.form-message').innerText = "";
    x.parentNode.querySelector('.form-message').classList.remove('invalid');
}
function add_invalid(x,message)
{
    x.parentNode.querySelector('.form-message').innerText = message;
    x.parentNode.querySelector('.form-message').classList.add('invalid');
}
function obl_tk(x)
{
    remove_animate(x);
    let reg = /^\w[a-zA-Z0-9\_]{0,16}$/;
    (x.value.trim()==="")   ?     add_invalid(x,"Vui lòng nhập tên đăng nhập"):
    (!reg.test(x.value))    ?     add_invalid(x,"Tên đăng nhập không hợp lệ, tối đa 16 ký tự (có thể chứa chữ, số và ký tự _ )"): remove_invalid(x);
}
function obl_mk(x)
{
    remove_animate(x);
    let reg = /^\w[a-zA-Z0-9\_]{0,16}$/;
    (x.value.trim()==="")   ?     add_invalid(x,"Vui lòng nhập mật khẩu"):
    (!reg.test(x.value))    ?     add_invalid(x,"Mật khẩu không hợp lệ, tối đa 16 ký tự (có thể chứa chữ, số và ký tự _ )"): remove_invalid(x);
    if (document.querySelector('#repassword').value.trim()!==""){
        (document.querySelector('#repassword').value.trim()!== x.value.trim()) ? add_invalid(document.querySelector('#repassword'),"Mật khẩu không khớp") : remove_invalid(document.querySelector('#repassword'));
    }
}
function obl_remk(x)
{
    remove_animate(x);
    (x.value.trim()==="")   ?     add_invalid(x,"Vui lòng nhập lại mật khẩu"):
    (document.querySelector('#password').value.trim() !== x.value.trim()) ? add_invalid(x,"Mật khẩu không khớp") : remove_invalid(x);
}
function oip(x)
{
    remove_invalid(x);
}

function obl_hoten(x)
{
    remove_animate(x);
    let reg = /[\`\=\[\]\;\'\/\!\~\@\#\$\%\^\&\*\(\)\+\|\{\}\:\"\<\>\?]/;
    (x.value.trim()==="" )  ?   add_invalid(x,"Vui lòng nhập họ và tên"):
    (reg.test(x.value)) ?   add_invalid(x,"Họ tên chứa ký tự không hợp lệ"):    remove_invalid(x)
}

function obl_sdt(x)
{
    remove_animate(x);
    let reg = /^(0)\d{9,}$/;
    (x.value.trim()==="" )  ?   add_invalid(x,"Vui lòng nhập số điện thoại"):
    (!reg.test(x.value)) ?   add_invalid(x,"Số điện thoại không hợp lệ (bắt đầu bằng số 0 và nhiều hơn 9 số)"):    remove_invalid(x)
}
function obl_email(x)
{
    remove_animate(x);
    let reg = /^[a-zA-Z0-9][a-zA-Z0-9\_]+@[a-zA-Z]+(\.[a-zA-Z]+){1,3}$/;
    (x.value.trim()==="" )  ?   add_invalid(x,"Vui lòng nhập email"):
    (!reg.test(x.value)) ?   add_invalid(x,"email không hợp lệ"):    remove_invalid(x)
}
function choose_file(x) 
{
        if(x.files)
        {
            var reader = new FileReader();
            reader.onload = function(e) 
            {
                $('#link-img').attr('value',e.target.result);
                $('#img').attr('src',e.target.result);
            }
            reader.readAsDataURL(x.files[0])
        }
}
