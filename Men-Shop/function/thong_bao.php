
    <style>
        #wall_thongBao{
            display:none;
            z-index: 333;
            width:100%;
            height:100%;
            background-color: rgb(197, 197, 197);
            position: fixed;
            opacity: 0.7;
        }
        #form_thongBao{
            display:none;
            z-index: 444;
            position: fixed;
            width: 100%;
            top: 40%;
            display: flex;
            justify-content: center;
            

        }
        #box_thongBao{
            display:none;
            text-align:center;
            padding: 40px 50px;
            border-radius: 20px;
            background-color: rgb(255, 255, 255);
        }
        #box_thongBao p{
            color: rgb(0, 0, 0);
            font-size: 30px;
        }
        #box_thongBao button{
            border:none;
            padding:10px 30px;
            background-color:#b7b7b7;
            border-radius:20px;
        }
    </style>
    

    <div id="wall_thongBao"></div>
    <div id="form_thongBao">
        <div id="box_thongBao">
            <p id="box_text">
                Vui lòng đăng nhập trước khi đặt hàng
            </p>
            <button onclick='hidden_ThongBao()'>Tiếp tục</button>
        </div>
    </div>


    <script>
        function hidden_ThongBao(){
            document.getElementById("wall_thongBao").style.display = "none";
            document.getElementById("form_thongBao").style.display = "flex";
            document.getElementById("box_thongBao").style.display = "none";

        }
        
        
    </script>    
