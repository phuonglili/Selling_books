function clr(x)
{
    if(document.querySelector('.colortb')!== null) 
    {
        document.querySelectorAll('.colortb .btn')[0].disabled = true;
        document.querySelectorAll('.colortb .btn')[1].disabled = true;
        document.querySelector('.colortb').classList.remove('colortb');
    }

    if ( x.parentNode.querySelector('.dplshow-sua')!== null)
    {
        a= x.parentNode.querySelector('.dplshow-sua')
        c= x.parentNode.querySelector('.dplshow-xoa')

        a.classList.add('dplnone');
        a.classList.remove('dplshow-sua');
        c.classList.add('dplnone');
        c.classList.remove('dplshow-xoa');
    }

    x.querySelectorAll('.btn')[0].disabled = false;
    x.querySelectorAll('.btn')[1].disabled = false;

    x.querySelector('#sua').classList.add('dplshow-sua');
    x.querySelector('#sua').classList.remove('dplnone');
    x.querySelector('#xoa').classList.add('dplshow-xoa');
    x.querySelector('#xoa').classList.remove('dplnone');

    x.classList.add('colortb');
}
function m_over(x) 
{
    x.classList.remove('animate__pulse', 'animate__repeat-2', 'animate__slow');
    x.classList.add('animate__rubberBand');
}
function m_out(x)
{
    x.classList.remove('animate__rubberBand');
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
function oip(x)
{
    remove_invalid(x);
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

function login_admin()
{
    document.querySelector('.login').classList.remove('animate__backInRight');
    document.querySelector('.login').classList.add('animate__shakeX');
    setTimeout(function(){
        document.querySelector('.login').classList.remove('animate__shakeX');
    },1000)
}

function dplnone(x)
{
    a = document.querySelectorAll('.dplnone1');
    if (x.checked==true)
    {
        a[0].classList.remove('dplnone');
        a[1].classList.remove('dplnone');
    }
    else
    {
        a[0].classList.add('dplnone');
        a[1].classList.add('dplnone');
    }
    
}

function obl_image(x) 
{
    remove_animate(x);
    let reg = /[\`\[\]\(\)\|\{\}\"\<\>]/;
    (x.value.trim()==="" )  ?   add_invalid(x,"Vui lòng nhập link hình ảnh"):
    (reg.test(x.value)) ?   add_invalid(x,"Địa chỉ hình ảnh chứa ký tự không được phép"):    remove_invalid(x)
    document.querySelector('#img').src = x.value;
}
function obl_tensach(x)
{
    remove_animate(x);
    let reg = /[\`\~\#\^\*\{\}\<\>]/;
    (x.value.trim()==="" )  ?   add_invalid(x,"Vui lòng nhập tên sách"):
    (reg.test(x.value)) ?   add_invalid(x,"Tên sách chứa ký tự không hợp lệ"):    remove_invalid(x)
}

function obl_tacgia(x)
{
    remove_animate(x);
    let reg = /[\`\-\=\[\]\~\@\#\$\%\^\*\(\)\{\}\?]/;
    (x.value.trim()==="" )  ?   add_invalid(x,"Vui lòng nhập tác giả"):
    (reg.test(x.value)) ?   add_invalid(x,"Tên tác giả chứa ký tự không hợp lệ"):    remove_invalid(x)
}
function obl_giatien(x)
{
    remove_animate(x);
    let reg = /^[0-9]+$/;
    (x.value.trim()==="" )  ?   add_invalid(x,"Vui lòng nhập giá tiền"):
    (!reg.test(x.value) ) ?   add_invalid(x,"Giá tiền chứa chứa ký tự không hợp lệ"):    remove_invalid(x)
}

function obl_mota(x)
{
    remove_animate(x);
    let reg = /[\`\=\[\]\~\@\#\%\*\+\|\{\}\<\>]/;
    (x.value.trim()==="" )  ?   add_invalid(x,"Vui lòng nhập mô tả"):
    (reg.test(x.value)) ?   add_invalid(x,"Mô tả chứa ký tự không hợp lệ"):    remove_invalid(x)
}
function obl_theloai(x)
{
    remove_animate(x);
}

function clr_dh(x)
{
    if(document.querySelector('.colortb')!== null) 
    {
        document.querySelector('.colortb .btn').disabled = true;
        document.querySelector('.colortb').classList.remove('colortb');
    }

    if ( x.parentNode.querySelector('.dplshow')!== null)
    {
        a= x.parentNode.querySelector('.dplshow')
        a.classList.add('dplnone');
        a.classList.remove('dplshow');
    }

    x.querySelector('.btn').disabled = false;

    x.querySelector('#sua').classList.add('dplshow');
    x.querySelector('#sua').classList.remove('dplnone');
    x.classList.add('colortb');
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
