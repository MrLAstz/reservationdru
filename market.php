<?php include('header.php'); ?>
<?php
    $Tb = DynDb_SelectTable("SELECT * FROM tb_market ");

    $ClsMarkets = array();
    foreach($Tb as $row)
    {
        $status_id = intval( $row['status_id'] );
        $numberbox = trim( $row['numberbox'] ); 
        
        $cls = 'cls-avail';
        if ($status_id == 2 || $status_id == 11)
            $cls = 'cls-reserved';
        if ($status_id == 3)
            $cls = 'cls-booking';
        
        $ClsMarkets[ $numberbox ] = $cls;
    }

?>
<style>
  /* ลองพื้นโครงสร้า่ง */
  .cls-1 {
    clip-path: url(#clip-Custom_Size_1);
  }
  /* สีพื้นหลัง */
  .cls-2 {
    fill: #e6e6e6;
  }

  /* สีเส้น */
  .cls-15,
  .cls-16 {
    stroke: none;
  }
  .cls-16 {
    fill: #707070;
  }

  /* .cls-17,
  .cls-4,
  .cls-5,
  .cls-6,
  .cls-7,
  .cls-8,
  .cls-9 {
    fill: none;
  } */

  /* เส้นกรอบ box */
  .cls-avail,
  .cls-4,
  .cls-5,
  .cls-6 {
    stroke: #707070;
  }
  
  /* กรอบเส้นดำหนา */
  .cls-4,
  .cls-8 {
    stroke-width: 3px;
  }
  /* กรอบเส้นดำหนา */
  .cls-5 {
    stroke-width: 5px;
  }
  /* กรอบเส้นดำหนา */
  .cls-7,
  .cls-8,
  .cls-9 {
    stroke: #000;
  }
  /* กรอบเส้นดำหนา */
  .cls-7 {
    stroke-width: 4px;
  }
  /* กรอบเส้นดำหนา */
  .cls-9 {
    stroke-width: 2px;
  }
  
  /* ขนาดอักษรโซน */
  .cls-10 {
    font-size: 28px;
  }

  /* ภาษา */
  .cls-10,
  .cls-11,
  .cls-12,
  .cls-14 {
    font-family: AngsanaNew, Angsana New;
  }

  
  /* ขนาดอักษร ประเภท */
  .cls-12 {
    font-size: 26px;
  }
  /* สี BOX ทั้งหมด */
  .cls-avail {
    fill: #60ff94;
  }
  .cls-reserved {
    fill: #ff3737;
  }
  .cls-booking {
    fill: #ffe713;
  }
    
  /* ขนาดอักษรภายใน box */
  .cls-14 {
    font-size: 23px;
  }


  /* .cls-18 {
    fill: #fff;
  } */
</style>


<div class="container ">
  <!-- detail -->
  <svg id="Group_3" data-name="Group 3" xmlns="http://www.w3.org/2000/svg" width="1152" height="117" viewBox="0 0 1152 117">
    <g id="Rectangle_4" data-name="Rectangle 4" fill="#fff" stroke="#707070" stroke-width="1">
      <rect width="1152" height="117" stroke="none" />
      <rect x="0.5" y="0.5" width="1151" height="116" fill="none" />
    </g>
    <text id="สีสถานะ_:" data-name="สีสถานะ :" transform="translate(53.666 22)" font-size="23" font-family="AngsanaNew, Angsana New">
      <tspan x="0" y="0">สีสถานะ :</tspan>
    </text>
    <rect id="Rectangle_5" data-name="Rectangle 5" width="24.755" height="16.55" transform="translate(170.506 43.96)" fill="#ff3737" />
    <text id="สีแดง_ไม่ว่าง" data-name="สีแดง  = ไม่ว่าง" transform="translate(211.984 57.374)" font-size="23" font-family="AngsanaNew, Angsana New">
      <tspan x="0" y="0" xml:space="preserve">สีแดง = ไม่ว่าง</tspan>
    </text>
    <rect id="Rectangle_6" data-name="Rectangle 6" width="24.755" height="16.55" transform="translate(170.506 16.445)" fill="#60ff94" />
    <text id="สีเขียว_ว่าง" data-name="สีเขียว  = ว่าง" transform="translate(212.867 29.595)" font-size="23" font-family="AngsanaNew, Angsana New">
      <tspan x="0" y="0" xml:space="preserve">สีเขียว = ว่าง</tspan>
    </text>
    <path id="Path_7" data-name="Path 7" d="M0,0H24.755V16.55H0Z" transform="translate(170.506 73.785)" fill="#ffe713" />
    <text id="สีเหลือง_จองแล้ว" data-name="สีเหลือง  = จองแล้ว" transform="translate(212.867 85.743)" font-size="23" font-family="AngsanaNew, Angsana New">
      <tspan x="0" y="0" xml:space="preserve">สีเหลือง = จองแล้ว</tspan>
    </text>
    <text id="ประเภทร้านค้า_:" data-name="ประเภทร้านค้า :" transform="translate(476.67 27.232)" font-size="23" font-family="AngsanaNew, Angsana New">
      <tspan x="0" y="0">ประเภทร้านค้า :</tspan>
    </text>
    <text id="ระบุโดยตัวอักษรบนพื้นที่" transform="translate(577.657 27.232)" font-size="23" font-family="AngsanaNew, Angsana New">
      <tspan x="0" y="0">ระบุโดยตัวอักษรบนพื้นที่</tspan>
    </text>
  </svg>




  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1151.34" height="668.92" viewBox="0 0 1151.34 668.92">
    <defs>
      <clipPath id="clip-Custom_Size_1">
        <rect width="1151.34" height="668.92" />
      </clipPath>
    </defs>
    <g id="Custom_Size_1" data-name="Custom Size – 1" class="cls-1">
      <rect class="cls-18" width="1151.34" height="668.92" />
      <g id="Group_1" data-name="Group 1">
        <g id="background" class="cls-2">
          <path class="cls-15" d="M 1150.841796875 668.4208984375 L 0.5000413060188293 668.4208984375 L 0.5000413060188293 0.5000511407852173 L 1150.841796875 0.5000511407852173 L 1150.841796875 668.4208984375 Z" />
          <path class="cls-16" d="M 1 1.00006103515625 L 1 667.9208984375 L 1150.341796875 667.9208984375 L 1150.341796875 1.00006103515625 L 1 1.00006103515625 M 0 6.103515625e-05 L 1151.341796875 6.103515625e-05 L 1151.341796875 668.9208984375 L 0 668.9208984375 L 0 6.103515625e-05 Z" />
        </g>
        <text id="ทางเข้า" class="cls-3" transform="translate(564.275 16.967)">
          <tspan x="0" y="0">ทางเข้า</tspan>
        </text>
        <g id="เส้นทางเข้า" transform="translate(473.977 0.967)">
          <line id="Line_4" data-name="Line 4" class="cls-4" y2="30.299" transform="translate(0)" />
          <line id="Line_5" data-name="Line 5" class="cls-4" y2="30.299" transform="translate(232.441)" />
          <line id="Line_6" data-name="Line 6" class="cls-4" x2="232.441" transform="translate(0 30.299)" />
        </g>
        <g id="linesm">
          <path id="Line1" class="cls-5" d="M1633,0" transform="translate(-1259.634 627.723)" />
          <line id="Line_5-2" data-name="Line 5" class="cls-6" x2="0.045" y2="539.735" transform="translate(407.99 97.144)" />
          <line id="Line_6-2" data-name="Line 6" class="cls-6" x1="0.068" y2="539.735" transform="translate(741.475 97.144)" />
          <line id="Line_7" data-name="Line 7" class="cls-6" x1="333.553" y1="0.781" transform="translate(407.99 349.376)" />
        </g>
        <g id="linexl">
          <path id="Line2" class="cls-7" d="M-1.76,0H368.408" transform="translate(39.709 96.129)" />
          <line id="Line_1" data-name="Line 1" class="cls-7" x2="1.777" y2="540.828" transform="translate(38.495 96.051)" />
          <line id="Line_2" data-name="Line 2" class="cls-8" x1="1064.599" transform="translate(40.174 636.879)" />
          <line id="Line_3" data-name="Line 3" class="cls-7" x1="0.053" y1="539.735" transform="translate(1104.719 97.144)" />
          <line id="Line_4-2" data-name="Line 4" class="cls-7" y1="0.153" x2="363.229" transform="translate(741.543 97.147)" />
          <line id="Line_8" data-name="Line 8" class="cls-7" x1="344.343" y1="0.025" transform="translate(38.495 350.21)" />
          <line id="Line_9" data-name="Line 9" class="cls-8" y2="126.194" transform="translate(407.99 395.137)" />
          <line id="Line_10" data-name="Line 10" class="cls-7" y2="126.194" transform="translate(741.989 395.137)" />
          <line id="Line_11" data-name="Line 11" class="cls-8" x2="0.045" y2="69.475" transform="translate(742.189 567.828)" />
          <line id="Line_12" data-name="Line 12" class="cls-9" x2="0.045" y2="69.475" transform="translate(407.99 567.404)" />
          <line id="Line_13" data-name="Line 13" class="cls-7" y2="107.765" transform="translate(741.543 163.82)" />
          <line id="Line_14" data-name="Line 14" class="cls-7" x1="203.41" transform="translate(473.966 349.844)" />
          <line id="Line_15" data-name="Line 15" class="cls-7" x1="0.117" y2="54.195" transform="translate(407.918 96.129)" />
        </g>
        <text id="N" class="cls-10" transform="translate(567.855 366.239)">
          <tspan x="0" y="0">N</tspan>
        </text>
        <text id="A" class="cls-10" transform="translate(202.447 58.876)">
          <tspan x="0" y="0">A</tspan>
        </text>
        <text id="B" class="cls-10" transform="translate(578.321 58.876)">
          <tspan x="0" y="0">B</tspan>
        </text>
        <text id="K" class="cls-10" transform="translate(922.934 57.876)">
          <tspan x="0" y="0">K</tspan>
        </text>
        <text id="อาหารและเครื่องดื่ม" class="cls-12" transform="translate(139.447 85.051)">
          <tspan x="0" y="0">อาหารและเครื่องดื่ม</tspan>
        </text>
        <text id="เสื้อผ้า" class="cls-12" transform="translate(555.414 89.049)">
          <tspan x="0" y="0">เสื้อผ้า</tspan>
        </text>
        <text id="เบ็ดเตล็ด" class="cls-12" transform="translate(894.101 86.394)">
          <tspan x="0" y="0">เบ็ดเตล็ด</tspan>
        </text>
        <text id="อาหารสด" class="cls-12" transform="translate(541.67 394.921)">
          <tspan x="0" y="0">อาหารสด</tspan>
        </text>

        <!-- ZONE A -->
        <g id="box1" transform="translate(63.643 0.384)" style="cursor: pointer" data-box="A1" data-toggle="modal" data-target="#modal_box">
          <g id="box1-2" data-name="box1" class="<?php echo $ClsMarkets['A1'] ?>" transform="translate(62.836 142.483)">
            <rect class="cls-15" width="88.969" height="50.134" />
            <rect class="cls-17" x="0.5" y="0.5" width="87.969" height="49.134" />
          </g>
          <text id="A1" class="cls-14" transform="translate(97.82 174.05)">
            <tspan x="0" y="0">A1</tspan>
          </text>
        </g>

        
        <g id="box2" transform="translate(23.84 43.001)" style="cursor: pointer" data-box="A2" data-toggle="modal" data-target="#modal_box">
          <g id="box2-2" data-name="box2" class="<?php echo $ClsMarkets['A2'] ?>" transform="translate(220.591 98.483)">
            <rect class="cls-15" width="88.969" height="50.134" />
            <rect class="cls-17" x="0.5" y="0.5" width="87.969" height="49.134" />
          </g>
          <text id="A2" class="cls-14" transform="translate(253.384 128)">
            <tspan x="0" y="0">A2</tspan>
          </text>
          
        </g>
        <g id="box3" transform="translate(1 25.807)" style="cursor: pointer" data-box="A3" data-toggle="modal" data-target="#modal_box">
          <g id="box3-2" data-name="box3" class="<?php echo $ClsMarkets['A3'] ?>" transform="translate(90.713 159.032) rotate(90)">
            <rect class="cls-15" width="88.969" height="50.442" />
            <rect class="cls-17" x="0.5" y="0.5" width="87.969" height="49.442" />
          </g>
          <text id="A3" class="cls-14" transform="translate(54.953 206.417)">
            <tspan x="0" y="0">A3</tspan>
          </text>
        </g>
        <g id="box4" transform="translate(72.18 -29.914)" style="cursor: pointer" data-box="A4" data-toggle="modal" data-target="#modal_box">
          <g id="box4-2" data-name="box4" class="<?php echo $ClsMarkets['A4'] ?>" transform="translate(136.767 343.381) rotate(180)">
            <rect class="cls-15" width="88.969" height="47.366" />
            <rect class="cls-17" x="0.5" y="0.5" width="87.969" height="46.366" />
          </g>
          <text id="A4" class="cls-14" transform="translate(82.725 324.001)">
            <tspan x="0" y="0">A4</tspan>
          </text>
        </g>
        <g id="box5" transform="translate(29.17 -29.914)" style="cursor: pointer" data-box="A5" data-toggle="modal" data-target="#modal_box">
          <g id="box5-2" data-name="box5" class="<?php echo $ClsMarkets['A5'] ?>" transform="translate(304.086 344.099) rotate(180)">
            <rect class="cls-15" width="88.824" height="48.084" />
            <rect class="cls-17" x="0.5" y="0.5" width="87.824" height="47.084" />
          </g>
          <text id="A5" class="cls-14" transform="translate(247.55 324.001)">
            <tspan x="0" y="0">A5</tspan>
          </text>
        </g>
        <g id="box6" transform="translate(117.234 4.703)" style="cursor: pointer" data-box="A6" data-toggle="modal" data-target="#modal_box">
          <g id="box6-2" data-name="box6" class="<?php echo $ClsMarkets['A6'] ?>" transform="translate(91.713 395.137) rotate(90)">
            <rect class="cls-15" width="88.969" height="50.442" />
            <rect class="cls-17" x="0.5" y="0.5" width="87.969" height="49.442" />
          </g>
          <text id="A6" class="cls-14" transform="translate(57.244 446.173)">
            <tspan x="0" y="0">A6</tspan>
          </text>
        </g>
        <g id="box7" transform="translate(-135.402 4.703)" style="cursor: pointer" data-box="A7" data-toggle="modal" data-target="#modal_box">
          <g id="box7-2" data-name="box7" class="<?php echo $ClsMarkets['A7'] ?>" transform="translate(394.79 395.137) rotate(90)">
            <rect class="cls-15" width="88.969" height="50.442" />
            <rect class="cls-17" x="0.5" y="0.5" width="87.969" height="49.442" />
          </g>
          <text id="A7" class="cls-14" transform="translate(362.516 446.173)">
            <tspan x="0" y="0">A7</tspan>
          </text>
        </g>
        <g id="box8" transform="translate(65.035 -54.717)" style="cursor: pointer" data-box="A8" data-toggle="modal" data-target="#modal_box">
          <g id="box8-2" data-name="box8" class="<?php echo $ClsMarkets['A8'] ?>" transform="translate(54.943 582.19)">
            <rect class="cls-15" width="88.969" height="46.851" />
            <rect class="cls-17" x="0.5" y="0.5" width="87.969" height="45.851" />
          </g>
          <text id="A8" class="cls-14" transform="translate(89.507 610.001)">
            <tspan x="0" y="0">A8</tspan>
          </text>
        </g>
        <g id="box9" transform="translate(-13.645 -54.78)" style="cursor: pointer" data-box="A9" data-toggle="modal" data-target="#modal_box">
          <g id="box9-2" data-name="box9" class="<?php echo $ClsMarkets['A9'] ?>" transform="translate(222.591 582.034)">
            <rect class="cls-15" width="88.969" height="47.071" />
            <rect class="cls-17" x="0.5" y="0.5" width="87.969" height="46.071" />
          </g>
          <text id="A9" class="cls-14" transform="translate(256.203 610.001)">
            <tspan x="0" y="0">A9</tspan>
          </text>
        </g>

        <!-- ZONE B -->
        <g id="box10_B1" data-name="box10 B1" transform="translate(36.768 1.862)" data-box="B1" style="cursor: pointer" data-toggle="modal" data-target="#modal_box">
          <g id="box10" class="<?php echo $ClsMarkets['B1'] ?>" transform="translate(501.41 97.301)">
            <rect class="cls-15" width="88.969" height="52.258" />
            <rect class="cls-17" x="0.5" y="0.5" width="87.969" height="51.258" />
          </g>
          <text id="B1" class="cls-14" transform="translate(536.412 127.001)">
            <tspan x="0" y="0">B1</tspan>
          </text>
        </g>
        <g id="box11" transform="translate(-7.82)" style="cursor: pointer" data-box="B2" data-toggle="modal" data-target="#modal_box">
          <g id="box11-2" data-name="box11" class="<?php echo $ClsMarkets['B2'] ?>" transform="translate(501.41 192.636)">
            <rect class="cls-15" width="83.824" height="50.134" />
            <rect class="cls-17" x="0.5" y="0.5" width="82.824" height="49.134" />
          </g>
          <text id="B2" class="cls-14" transform="translate(534 222)">
            <tspan x="0" y="0">B2</tspan>
          </text>
        </g>
        <g id="box12" transform="translate(-7.82)" style="cursor: pointer" data-box="B3" data-toggle="modal" data-target="#modal_box"> 
          <g id="box12-2" data-name="box12" class="<?php echo $ClsMarkets['B3'] ?>" transform="translate(585.234 192.636)">
            <rect class="cls-15" width="83.824" height="50.134" />
            <rect class="cls-17" x="0.5" y="0.5" width="82.824" height="49.134" />
          </g>
          <text id="B3" class="cls-14" transform="translate(617.825 222)">
            <tspan x="0" y="0">B3</tspan>
          </text>
        </g>
        <g id="box13" transform="translate(35.147 5.973)" style="cursor: pointer" data-box="B4" data-toggle="modal" data-target="#modal_box">
          <g id="box13-2" data-name="box13" class="<?php echo $ClsMarkets['B4'] ?>" transform="translate(501.41 296.015)">
            <rect class="cls-15" width="89.156" height="47.161" />
            <rect class="cls-17" x="0.5" y="0.5" width="88.156" height="46.161" />
          </g>
          <text id="B4" class="cls-14" transform="translate(536.877 315.001)">
            <tspan x="0" y="0">B4</tspan>
          </text>
        </g>

        <!-- ZONE N -->
        <g id="box14_N1" data-name="box14 N1" transform="translate(76.989 27.38)" data-box="N1" style="cursor: pointer" data-toggle="modal" data-target="#modal_box">
          <g id="box14" class="<?php echo $ClsMarkets['N1'] ?>" transform="translate(473.977 395.137) rotate(90)">
            <rect class="cls-15" width="66.292" height="63.393" />
            <rect class="cls-17" x="0.5" y="0.5" width="65.292" height="62.393" />
          </g>
          <text id="N1" class="cls-14" transform="translate(433 433)">
            <tspan x="0" y="0">N1</tspan>
          </text>
        </g>
        <g id="box15" transform="translate(-122.977 27.38)" style="cursor: pointer" data-box="N2" data-toggle="modal" data-target="#modal_box">
          <g id="box15-2" data-name="box15" class="<?php echo $ClsMarkets['N2'] ?>" transform="translate(737.336 395.137) rotate(90)">
            <rect class="cls-15" width="66.292" height="63.393" />
            <rect class="cls-17" x="0.5" y="0.5" width="65.292" height="62.393" />
          </g>
          <text id="N2" class="cls-14" transform="translate(696.639 433.283)">
            <tspan x="0" y="0">N2</tspan>
          </text>
        </g>
        <g id="box16" transform="translate(203.775 -38.912)" style="cursor: pointer" data-box="N3" data-toggle="modal" data-target="#modal_box">
          <g id="box16-2" data-name="box16" class="<?php echo $ClsMarkets['N3'] ?>" transform="translate(473.977 461.429) rotate(90)">
            <rect class="cls-15" width="66.292" height="63.393" />
            <rect class="cls-17" x="0.5" y="0.5" width="65.292" height="62.393" />
          </g>
          <text id="N3" class="cls-14" transform="translate(433 499.292)">
            <tspan x="0" y="0">N3</tspan>
          </text>
        </g>
        <g id="box17" transform="translate(-199.966 93.136)" style="cursor: pointer" data-box="N4" data-toggle="modal" data-target="#modal_box">
          <g id="box17-2" data-name="box17" class="<?php echo $ClsMarkets['N4'] ?>" transform="translate(743.894 463.001) rotate(90)">
            <rect class="cls-15" width="66.86" height="69.951" />
            <rect class="cls-17" x="0.5" y="0.5" width="65.86" height="68.951" />
          </g>
          <text id="N4" class="cls-14" transform="translate(699.992 500.147)">
            <tspan x="0" y="0">N4</tspan>
          </text>
        </g>
        <g id="box18" transform="translate(129.728 -28.052)" style="cursor: pointer" data-box="N5" data-toggle="modal" data-target="#modal_box">
          <g id="box18-2" data-name="box18" class="<?php echo $ClsMarkets['N5'] ?>" transform="translate(484.631 584.376)">
            <rect class="cls-15" width="69.417" height="66.369" />
            <rect class="cls-17" x="0.5" y="0.5" width="68.417" height="65.369" />
          </g>
          <text id="N5" class="cls-14" transform="translate(509.839 621.561)">
            <tspan x="0" y="0">N5</tspan>
          </text>
        </g>

        <!-- ZONE K -->
        <g id="box19_K1" data-name="box19 K1" transform="translate(27.404 -1.138)" data-box="K1" style="cursor: pointer" data-toggle="modal" data-target="#modal_box">
          <g id="box19" class="<?php echo $ClsMarkets['K1'] ?>" transform="translate(941.632 151.139) rotate(180)">
            <rect class="cls-15" width="88.969" height="50.989" />
            <rect class="cls-17" x="0.5" y="0.5" width="87.969" height="49.989" />
          </g>
          <text id="K1" class="cls-14" transform="translate(887.183 130.001)">
            <tspan x="0" y="0">K1</tspan>
          </text>
        </g>
        <g id="box20" transform="translate(4.279 8.623)" style="cursor: pointer" data-box="K2" data-toggle="modal" data-target="#modal_box">
          <g id="box20-2" data-name="box20" class="<?php echo $ClsMarkets['K2'] ?>" transform="translate(1087.043 159.311) rotate(90)">
            <rect class="cls-15" width="88.969" height="50.442" />
            <rect class="cls-17" x="0.5" y="0.5" width="87.969" height="49.442" />
          </g>
          <text id="K2" class="cls-14" transform="translate(1051.757 209.819)">
            <tspan x="0" y="0">K2</tspan>
          </text>
        </g>
        <g id="box21" transform="translate(30.404 -81.038)" style="cursor: pointer" data-box="K3" data-toggle="modal" data-target="#modal_box">
          <g id="box21-2" data-name="box21" class="<?php echo $ClsMarkets['K3'] ?>" transform="translate(937.557 347.139) rotate(180)">
            <rect class="cls-15" width="88.969" height="51.124" />
            <rect class="cls-17" x="0.5" y="0.5" width="87.969" height="50.124" />
          </g>
          <text id="K3" class="cls-14" transform="translate(883.731 327.001)">
            <tspan x="0" y="0">K3</tspan>
          </text>
        </g>
        <g id="box22" transform="translate(118.737 -22.555)" style="cursor: pointer" data-box="K4" data-toggle="modal" data-target="#modal_box">
          <g id="box22-2" data-name="box22" class="<?php echo $ClsMarkets['K4'] ?>" transform="translate(794.316 388.421) rotate(90)">
            <rect class="cls-15" width="89.78" height="50.442" />
            <rect class="cls-17" x="0.5" y="0.5" width="88.78" height="49.442" />
          </g>
          <text id="K4" class="cls-14" transform="translate(760.245 439.638)">
            <tspan x="0" y="0">K4</tspan>
          </text>
        </g>
        <g id="box23" transform="translate(-102.377 -21.744)" style="cursor: pointer" data-box="K5" data-toggle="modal" data-target="#modal_box">
          <g id="box23-2" data-name="box23" class="<?php echo $ClsMarkets['K5'] ?>" transform="translate(1082.253 388.421) rotate(90)">
            <rect class="cls-15" width="88.969" height="50.442" />
            <rect class="cls-17" x="0.5" y="0.5" width="87.969" height="49.442" />
          </g>
          <text id="K5" class="cls-14" transform="translate(1048.554 439.29)">
            <tspan x="0" y="0">K5</tspan>
          </text>
        </g>
        <g id="box24" transform="translate(67.181 -10.052)" style="cursor: pointer" data-box="K6" data-toggle="modal" data-target="#modal_box">
          <g id="box24-2" data-name="box24" class="<?php echo $ClsMarkets['K6'] ?>" transform="translate(845.872 635.648) rotate(180)">
            <rect class="cls-15" width="88.969" height="51.272" />
            <rect class="cls-17" x="0.5" y="0.5" width="87.969" height="50.272" />
          </g>
          <text id="K6" class="cls-14" transform="translate(792.722 615.001)">
            <tspan x="0" y="0">K6</tspan>
          </text>
        </g>
        <g id="box25" transform="translate(-1.648 -10.052)" style="cursor: pointer" data-box="K7" data-toggle="modal" data-target="#modal_box">
          <g id="box25-2" data-name="box25" class="<?php echo $ClsMarkets['K7'] ?>" transform="translate(1015.169 635.648) rotate(180)">
            <rect class="cls-15" width="88.969" height="51.272" />
            <rect class="cls-17" x="0.5" y="0.5" width="87.969" height="50.272" />
          </g>
          <text id="K7" class="cls-14" transform="translate(961.467 615.001)">
            <tspan x="0" y="0">K7</tspan>
          </text>
        </g>
      </g>
    </g>
  </svg>


  <!-- Modal -->
  <div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <a> <img src="../template/images/logo2.0.png" alt="Logo"></a>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <iframe id="in_content" src="about:blank" width="100%" height="680" frameborder="0" style="display: none; border: 0"></iframe>
        </div>
      </div>
    </div>
  </div>
    
<script>
    document.addEventListener('DOMContentLoaded', function(ev) {    
        jQuery('[data-box]').click(function() {
            //var box = (jQuery(this).attr('data-box'));
            window.location = "login.php";
        });
    });
</script>

<?php include('footer.php'); ?>