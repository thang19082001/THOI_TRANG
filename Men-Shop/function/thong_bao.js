        //Thông báo đăng nhập
        const get_id = document.querySelectorAll(".not_sesstion")
        for (let i = 0; i < get_id.length; i++) {
            get_id[i].addEventListener('click',function Show_ThongBao(){
                document.getElementById("wall_thongBao").style.display = "block";
                document.getElementById("form_thongBao").style.display = "flex";
                document.getElementById("box_thongBao").style.display = "block";
            })
          }
        
          function show_thongBao(){
            document.getElementById("wall_thongBao").style.display = "block";
                document.getElementById("form_thongBao").style.display = "flex";
                document.getElementById("box_thongBao").style.display = "block";
          }
       