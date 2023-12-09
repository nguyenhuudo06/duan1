<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LittleCat</title>
    <link rel="stylesheet" href="{{ asset('admins\home\style.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://unpkg.com/scrollreveal"></script>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admins\home\chatbox.css') }}">
    <link rel="stylesheet" href="{{ asset('admins\home\style2.css') }}">
</head>

<body>
    <!-- @if($product != null)
            <p>Đã có dữ liệu</p>
        @endif -->
    <div class="chatbox-wrapper">
        <div class="chatbox-toggle">
            <i class='bx bxl-messenger'></i>
        </div>
        <div class="chatbox-toggle1">
            <a href="lien-he.html"> <i class='bx bx-phone-call'></i></a>
        </div>
        <div class="chatbox-message-wrapper">
            <div class="chatbox-message-header">
                <div class="chatbox-message-profile">

                    <div>
                        <h4 class="chatbox-message-name">Admin</h4>
                        <p class="chatbox-message-status">Đang trực tuyến</p>
                    </div>
                </div>
                <div class="chatbox-message-dropdown">
                    <i class='bx bx-dots-vertical-rounded chatbox-message-dropdown-toggle'></i>
                    <ul class="chatbox-message-dropdown-menu">
                        <li>
                            <a href="">Tìm kiếm</a>
                        </li>
                        <li>
                            <a href="">Phản hồi</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="chatbox-message-content">
                <h4 class="chatbox-message-no-message">Bạn chưa có tin nhắn!</h4>
            </div>
            <div class="chatbox-message-bottom">
                <form action="#" class="chatbox-message-form">
                    <textarea rows="1" placeholder="Nhắn tin..." class="chatbox-message-input"></textarea>
                    <button type="submit" class="chatbox-message-submit"><i class='bx bx-send'></i></button>
                </form>
            </div>
        </div>
    </div>


    <script src="{{ asset('admins\home\script.js') }}"></script>
</body>

</html>



<style>


</style>
<script>
    // MESSAGE INPUT
    const textarea = document.querySelector('.chatbox-message-input')
    const chatboxForm = document.querySelector('.chatbox-message-form')

    textarea.addEventListener('input', function() {
        let line = textarea.value.split('\n').length

        if (textarea.rows < 6 || line < 6) {
            textarea.rows = line
        }

        if (textarea.rows > 1) {
            chatboxForm.style.alignItems = 'flex-end'
        } else {
            chatboxForm.style.alignItems = 'center'
        }
    })



    // TOGGLE CHATBOX
    const chatboxToggle = document.querySelector('.chatbox-toggle')
    const chatboxMessage = document.querySelector('.chatbox-message-wrapper')

    chatboxToggle.addEventListener('click', function() {
        chatboxMessage.classList.toggle('show')
    })



    // DROPDOWN TOGGLE
    const dropdownToggle = document.querySelector('.chatbox-message-dropdown-toggle')
    const dropdownMenu = document.querySelector('.chatbox-message-dropdown-menu')

    dropdownToggle.addEventListener('click', function() {
        dropdownMenu.classList.toggle('show')
    })

    document.addEventListener('click', function(e) {
        if (!e.target.matches('.chatbox-message-dropdown, .chatbox-message-dropdown *')) {
            dropdownMenu.classList.remove('show')
        }
    })


    // CHATBOX MESSAGE
    const chatboxMessageWrapper = document.querySelector('.chatbox-message-content')
    const chatboxNoMessage = document.querySelector('.chatbox-message-no-message')

    chatboxForm.addEventListener('submit', function(e) {
        e.preventDefault()

        if (isValid(textarea.value)) {
            writeMessage()
            setTimeout(autoReply, 1000)
        }
    })



    function addZero(num) {
        return num < 10 ? '0' + num : num
    }

    function writeMessage() {
        const today = new Date()
        let message = `
        <div class="chatbox-message-item sent">
            <span class="chatbox-message-item-text">
                ${textarea.value.trim().replace(/\n/g, '<br>\n')}
            </span>
            <span class="chatbox-message-item-time">${addZero(today.getHours())}:${addZero(today.getMinutes())}</span>
        </div>
    `
        chatboxMessageWrapper.insertAdjacentHTML('beforeend', message)
        chatboxForm.style.alignItems = 'center'
        textarea.rows = 1
        textarea.focus()
        textarea.value = ''
        chatboxNoMessage.style.display = 'none'
        scrollBottom()
    }

    function autoReply() {
        const today = new Date()
        let message = `
        <div class="chatbox-message-item received">
            <span class="chatbox-message-item-text">
                Cảm ơn bạn đã góp ý kiến!
            </span>
            <span class="chatbox-message-item-time">${addZero(today.getHours())}:${addZero(today.getMinutes())}</span>
        </div>
    `
        chatboxMessageWrapper.insertAdjacentHTML('beforeend', message)
        scrollBottom()
    }

    function scrollBottom() {
        chatboxMessageWrapper.scrollTo(0, chatboxMessageWrapper.scrollHeight)
    }

    function isValid(value) {
        let text = value.replace(/\n/g, '')
        text = text.replace(/\s/g, '')

        return text.length > 0
    }
</script>

</head>


<body>
    <div class="head">

        <a href="#">
            <div class="logo">
                <img width="90px" src="image/Cute Cat Grooming Logo.png" alt="">
        </a>
        <h2> LittleCat </h2>
    </div>
    <div class="top-right">
        <a href="./dangnhap.html"><i class='bx bx-user'></i></a>
        <a href="{{route('cart.index')}}"><i class='bx bx-cart'></i></a>
    </div>
    </div>

    <nav>
        <ul class="menu">
            <li><a href="">Trang Chủ</a></li>
            <li><a href="./lien-he.html">Liên Hệ</a></li>
            <li>
                <a href="./sanpham.html">Sản Phẩm</a>
                <ul class="menucon">
                    <li>Thức Ăn Cho Mèo</li>
                    <li>Phụ Kiện Cho Mèo</li>
                    <li>Thông Tin Các Giống Mèo</li>
                    <li>Thời Trang Mèo</li>
                </ul>
            </li>
            <li><a href="./blog.html">Blog</a></li>
            <div class="search">
                <input type="text" placeholder="Bạn muốn tìm gì?">
                <a class="tk" href=""><i class='bx bx-search'></i></a>

            </div>
        </ul>

    </nav>


    <header>
        <!-- <div class="slideshow-container">

            <div class="mySlides fade">
                <img id="hinhanh" src="image/header.webp" style="height: 435px;">
            </div>
    
            <div class="mySlides fade">
                <img src="image/he4.png" style="height: 435px;">
            </div>
            <div class="mySlides fade">
                <img src="image/he3.jpg" style="height: 435px;">
            </div>
    
            <div class="mySlides fade">
                <img src="image/he5.jpg" style="height: 435px;">
            </div>
            <div class="mySlides fade">
                <img src="image/he6.jpg" style="height: 435px;">
            </div>
            <div class="mySlides fade">
                <img src="image/he2.jpg" style="height: 435px;">
            </div>
            
    
            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>
        </div> -->
        <br>

        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
            <span class="dot" onclick="currentSlide(5)"></span>
            <span class="dot" onclick="currentSlide(6)"></span>
        </div>
    </header>

    <div class="danhmuc">
        <h1>Danh Mục Sản Phẩm</h1>
    </div>
    <div class="hot">
        <h2>Sản phẩm bán chạy nhất</h2>
        <i class='bx bxs-hot'></i>
    </div>
    <article>
        @foreach($product as $prd)
        <div class="khung">
            <a href="{{route('productdetail.index', ['id' => $prd->id])}}">
                <div class="hinh">
                    <img src="{{$prd->feature_image_path}}" alt="">
                </div>
                <div class="thongtin">
                    <h3>{{$prd->name}}
            </a></h3><span> {{number_format($prd->price)}} VNĐ</span>
        </div>
        </a>


        <div class="nutan">
            <a href="sanpham/thuc-an-cho-meo-tuna.php"><input type="button" value="Thông Tin Chi Tiết"></a>
            <div class="rating">
                <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                <span style="font-size:120%;color:rgb(0, 0, 0);">&starf;</span>
                <span style="font-size:120%;color:rgb(0, 0, 0);">&starf;</span>
            </div>
        </div>
        </div>
        @endforeach
        <!-- <div class="khung">
            <div class="hinh">
                <a href="sanpham/do-dung-thuc-an.php"><img src="image/phukien5.jpg" alt="">
                </a></div>
            <div class="thongtin">
                <h3><a href="sanpham/do-dung-thuc-an.php">Đồ đựng thức ăn</a></h3><span> Giá: 69.000 VNĐ</span>
            </div>
         
            <div class="nutan">
                <a href="sanpham/do-dung-thuc-an.php"><input type="button" value="Thông Tin Chi Tiết"></a>
                <div class="rating">
                    <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                    <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                    <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                    <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                    <span style="font-size:120%;color:rgb(0, 0, 0);">&starf;</span>
                </div>

            </div>
        </div>
        <div class="khung">
            <div class="hinh">
                <a href="sanpham/thuc-an-cho-meo-zoi-cat.php"><img src="image/1.png" alt="">
                </a></div>
            <div class="thongtin">
                <h3><a href="sanpham/thuc-an-cho-meo-zoi-cat.php">Thức ăn cho mèo Zoi Cat</a></h3><span> Giá: 150.000
                    VNĐ</span>
            </div>
          
            <div class="nutan">
                <a href="sanpham/thuc-an-cho-meo-zoi-cat.php"><input type="button" value="Thông Tin Chi Tiết"></a>
                <div class="rating">
                    <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                    <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                    <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                    <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                    <span style="font-size:120%;color:rgb(0, 0, 0);">&starf;</span>
                </div>
            </div>
        </div>
        <div class="khung">
            <div class="hinh">
                <a href="sanpham/cat-ve-sinh-aatas.php"><img src="image/catvs.jpg" alt="">
                </a></div>
            <div class="thongtin">
                <h3><a href="sanpham/cat-ve-sinh-aatas.php">Cát vệ sinh Aatas</a></h3><span> Giá: 239.000 VNĐ</span>
            </div>
           
            <div class="nutan">
                <a href="sanpham/cat-ve-sinh-aatas.php"><input type="button" value="Thông Tin Chi Tiết"></a>
                <div class="rating">
                    <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                    <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                    <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                    <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                    <span style="font-size:120%;color:rgb(0, 0, 0);">&starf;</span>
                </div>
            </div>
        </div> -->

    </article>

    <aside>
        <div class="gioithieu">
            <h2>Thức Ăn Cho Mèo</h2>
            <i class='bx bx-bowl-rice'></i>
        </div>

        <div class="thucan">
            <div class="khung">
                <div class="hinh">
                    <a href="./sanpham/hat-vi-ca-hoi-va-rau.php"> <img src="image/thucan1.jpg" alt="">
                    </a>
                </div>
                <div class="thongtin">
                    <h3><a href="./sanpham/hat-vi-ca-hoi-va-rau.php">Hạt vị cá hồi và rau </a> </h3> <span> Giá: 150.000 VNĐ</span>
                </div>

                <div class="nutan">
                    <input type="button" value="Thông Tin Chi Tiết">
                    <div class="rating">
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(0, 0, 0);">&starf;</span>
                    </div>
                </div>
            </div>
            <div class="khung">
                <div class="hinh">
                    <a href="./sanpham/Soup-lon-vi-ga.php"> <img src="image/thucan2.jpg" alt="">
                    </a>
                </div>
                <div class="thongtin">
                    <h3><a href="./sanpham/Soup-lon-vi-ga.php">Soup lon vị gà cho </a> </h3> <span> Giá: 50.000 VNĐ</span>
                </div>

                <div class="nutan">
                    <input type="button" value="Thông Tin Chi Tiết">
                    <div class="rating">
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(0, 0, 0);">&starf;</span>
                    </div>
                </div>
            </div>
            <div class="khung">
                <div class="hinh">
                    <a href="./sanpham/hat-vi-ca-thu.php"> <img src="image/thucan3.jpg" alt="">
                    </a>
                </div>
                <div class="thongtin">
                    <h3><a href="./sanpham/hat-vi-ca-thu.php">Hạt vị cá thu</a> </h3> <span> Giá: 150.000 VNĐ</span>
                </div>

                <div class="nutan">
                    <input type="button" value="Thông Tin Chi Tiết">
                    <div class="rating">
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(0, 0, 0);">&starf;</span>
                    </div>
                </div>
            </div>
            <div class="khung">
                <div class="hinh">
                    <a href="./sanpham/hat-vi-tong-hop.php"> <img src="image/thucan4.jpg" alt="">
                    </a>
                </div>
                <div class="thongtin">
                    <h3><a href="./sanpham/hat-vi-tong-hop.php">Hạt vị tổng hợp</a> </h3> <span> Giá: 150.000 VNĐ</span>
                </div>

                <div class="nutan">
                    <input type="button" value="Thông Tin Chi Tiết">
                    <div class="rating">
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(0, 0, 0);">&starf;</span>
                    </div>
                </div>
            </div>

        </div>
        <div class="more">
            <input type="button" value="Xem Thêm...">
        </div>

        <div class="phukien">
            <h2>Phụ Kiện Cho Mèo</h2>
            <i class="ri-shopping-bag-line"></i>

        </div>
        <div class="spphukien">
            <div class="khung">
                <div class="hinh">
                    <a href="thongtinsp.html"> <img src="image/phukien1.png" alt="">
                    </a>
                </div>
                <div class="thongtin">
                    <h3><a href="thongtinsp.html">Túi đựng mèo</a> </h3> <span> Giá: 350.000 VNĐ</span>
                </div>

                <div class="nutan">
                    <input type="button" value="Thông Tin Chi Tiết">
                    <div class="rating">
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(0, 0, 0);">&starf;</span>
                    </div>
                </div>
            </div>
            <div class="khung">
                <div class="hinh">
                    <a href="thongtinsp.html"> <img src="image/phukien2.jpg" alt="">
                    </a>
                </div>
                <div class="thongtin">
                    <h3><a href="thongtinsp.html">Túi đựng mèo</a> </h3> <span> Giá: 250.000 VNĐ</span>
                </div>

                <div class="nutan">
                    <input type="button" value="Thông Tin Chi Tiết">
                    <div class="rating">
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(0, 0, 0);">&starf;</span>
                    </div>
                </div>
            </div>
            <div class="khung">
                <div class="hinh">
                    <a href="thongtinsp.html"> <img src="image/phukien5.jpg" alt="">
                    </a>
                </div>
                <div class="thongtin">
                    <h3><a href="thongtinsp.html">Túi ngủ cho mèo</a> </h3> <span> Giá: 550.000 VNĐ</span>
                </div>

                <div class="nutan">
                    <input type="button" value="Thông Tin Chi Tiết">
                    <div class="rating">
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(0, 0, 0);">&starf;</span>
                    </div>
                </div>
            </div>
            <div class="khung">
                <div class="hinh">
                    <a href="thongtinsp.html"> <img src="image/phukien4.jpg" alt="">
                    </a>
                </div>
                <div class="thongtin">
                    <h3><a href="thongtinsp.html">Nhà vệ sinh cho mèo</a> </h3> <span> Giá: 159.000 VNĐ</span>
                </div>
                <div class="nutan">
                    <input type="button" value="Thông Tin Chi Tiết">
                    <div class="rating">
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(255, 196, 0);">&starf;</span>
                        <span style="font-size:120%;color:rgb(0, 0, 0);">&starf;</span>
                    </div>
                </div>
            </div>

        </div>

        <div class="more">
            <input type="button" value="Xem Thêm...">
        </div>

    </aside>
    <!-- //map -->
    <br>
    <div class="map-text">
        <h1>Hãy đến LittleCat để có thêm nhiều ưu đãi <i class='bx bxs-hot'></i></h1>
    </div>
    <br>
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1776.0815737413075!2d108.05522439106338!3d12.690471949969883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3171f74251e94f17%3A0x3879b05dc9401f68!2zU0nDilUgVEjhu4ogVEjDmiBDxq9ORyBDSMOTUCBQRVRTSE9Q!5e0!3m2!1svi!2s!4v1686820600156!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <br>





    <footer>
        <div class="tuvan">
            <h1>Tư Vấn Mua Hàng Cùng LittleCat</h1>
            <input type="text" placeholder="Họ và tên ...">
            <input type="text" placeholder="Số điện thoại ...">

            <button>Gửi Liên Hệ</button>
        </div>
        <div class="end">


            <div class="about">
                <h3><a href="thongtinsp.html">HỖ TRỢ KHÁCH HÀNG</a></h3><br>
                <li>Hoạt động từ 8h – 21h hàng ngày: 0123456789</li>
                <li>Hỗ trợ đơn hàng online: 8h – 17h, Thứ Hai đến Thứ Bảy: 0123456789</li>
                <li>Phương thức thanh toán</li>
                <li>Phương thức giao hàng</li>
                <li>Hướng dẫn đổi trả hàng</li>
                <li>Hướng dẫn mua hàng</li>
                <li>Câu hỏi thường gặp</li>
                <li>Chính sách hàng nhập khẩu</li>

            </div>
            <div class="thongtinbanquyen">
                <h3><a href="thongtinsp.html">VỀ LITTLECAT</a></h3><br>
                <li>Liên hệ</li>
                <li>Tuyển dụng</li>
                <li>Mua phụ kiện cho thú cưng</li>
                <li>Blog Boss và Sen</li>
                <li>Blog Thú cưng</li>
                <li>Cát vệ sinh cho mèo</li>
                <li>Đồ chơi cho mèo</li>

            </div>
            <div class="hotro">
                <h3><a href="thongtinsp.html">HỢP TÁC VÀ LIÊN KẾT</a></h3><br>
                <li>Quy chế hoạt động của LittleCat</li>
                <li>Bán hàng cùng LittleCat</li>
                <img src="image/Cute Cat Grooming Logo.png" alt="">

            </div>
        </div>

        <div class="banquyen">
            <a href="">Bản quyền © 2023 CÔNG TY TNHH LITTLECAT VIỆT NAM – Giấy phép ĐKKD số 0123456</a>
        </div>
    </footer>

    <script src="{{ asset('admins\home\index.js') }}"></script>
    <section>

    </section>

</body>


</html>