<?php
session_start();
include("../conn.php")

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("../layouts/title.php")?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  #rcorners1 {
    border-radius: 25px;
    background: #73AD21;
    padding: 10px; 
    text-align: center;
    background-color: #6F3B06;
    color: #fff;
        
  }

  img{
    border-radius: 25px;
    -webkit-box-shadow: 0 12px 34px rgba(0, 0, 0, 0.12);
    -moz-box-shadow: 0 12px 34px rgba(0, 0, 0, 0.12);
    box-shadow: 0 12px 34px rgba(0, 0, 0, 0.12);
  }
  </style>
</head>
<body>



<?php include("../layouts/navbar.php")?>

<div class="container mt-5">
  <div class="row">
    <div class="col-2" id="rcorners1">
      อาหารพื้นบ้าน บ้านนาตาโพ
    </div>
    <p class="mt-5" style="text-indent: 5%;">อาหารพื้นบ้านของหมู่บ้านนาตาโพในสมัยก่อนจนถึงปัจจุบัน ส่วนใหญ่อาหารการกินจะเป็นการกินอาหารตามฤดูกาลในช่วงฤดูไหนมีอะไรชาวบ้านก็จะกินอันนั้น เช่น หน้าแล้งอย่างช่วงเดือนมีนาคม-เมษายน ก็จะเป็นช่วงที่ผักหวานป่าออกหยอด ออกดอก ออกผล ชาวบ้านก็จะขึ้นภูเขาเพื่อไปเก็บมาปรุงอาหาร (แต่ในปัจจุบันมีการนำเมล็ดมาเพาะและปลูกตามบ้านได้แล้ว) ซึ่งช่วงหน้าผักหวานป่าจะเป็นช่วงเดียวกับมดแดงที่ทำรังและมีไข่คนก็นำมาปรุงเป็น แกงผักหวานใส่ไข่มดแดง หรือบางคนอาจจะนำไปปรุงในเมนูอื่นๆก็ได้ พอเข้าสู่หน้าฝนก็จะเป็นพวกเห็ดและหน่อไม้ เช่น เห็ดเผาะ เห็ดโคน เห็ดไผ่ เห็ดขอน ก็จะนำมาปรุงในรูปแบบเมนูที่ต่างกันออกไป พอเข้าสู่หน้าหนาวจะเป็นช่วงฤดูการเก็บเกี่ยว นอกจากผลผลิตทางการเกษตรแล้วสมัยก่อนเวลาปลูกข้าวทำไร่ทำนา คนสมัยก่อนจะไม่ปลูกพืชชนิดเดียว ในไร่หนึ่งแปลงจะมีการปลูกพืชอื่นๆลงไปด้วย เช่นสมัยก่อนเวลาทำไร่ข้าวจะนำเมล็ดฝ้าย เมล็ดแตงต่างๆ ถั่ว มันแกว มะเขือเทศ คนผสมไปกับเมล็ดข้าวก่อนจะปลูกลงดินในข้าวหนึ่งหลุมจะไม่ได้มีแค่ข้าวแต่จะมีอย่างอื่นปลูกลงไปด้วย เพื่อให้ในที่ดิน1แปลงมีอาหารให้เก็บกินได้ตลอดทั้งปี พอไปไร่ช่วงที่แตงแก่ก็จะได้กินแตง ทุกอย่างที่ปลูกรวมไปจึงเป็นเสมือนตู้เย็นที่มีของสดให้สามารถเก็บกินได้ตลอด จนกระทั่งถึงช่วงเก็บเกี่ยวข้าวเสร็จ ฝ้ายที่ปลูกไว้ก็จะแตกบานให้เก็บเพื่อนำมาทำเส้นใยในการทอผ้า และช่วงปลายปีอาหารตามฤดูการจะมีจำนวนมาก เช่น สะเดา ดอกแคป่า บอน เครือหมาน้อย ทุกอย่างล้วนเป็นอาหารที่ใช้ปรุงเพื่อรับประทานให้เป็นยากับร่างกาย คนสมัยก่อนจะค่อนข้างมีอายุยืนและแข็งแรง เพราะพืชผักที่นำมาปรุงอาหารล้วนเกิดขึ้นตามช่วงเวลา ตามที่เขาบอกว่ากินให้เป็นยา จะมีมีการเร่งสารเพื่อให้มีตลอดทั้งปี ต่างกับสมัยนี้นอกจากความสะดวกสบายแล้ว การทำธุรกิจเพื่อทำตลาดผักผลไม้จะเกิดตามฤดูกาลจึงมีการพัฒนาเพื่อให้มีนอกฤดูกาล การใช้สารเคมี ปุ๋ย หรือสารต่างๆจึงกลายเป็นผลเสียต่อร่างกายแทน นอกจากทานอาหารให้เป็นยาแล้วในเรื่องประเพณีการกินความเชื่อก็ยังมีหลงเหลืออยู่ เช่น ถ้าญาติพี่น้องหรือเพื่อนฝูงมาเยี่ยม อาหารที่จะปรุงจะมีเมนูที่ทำจากไก่ เช่น ต้มไก่ แกงไก่ ฯ เพราะคนสมัยก่อนเชื่อว่า ไก่เป็นสัตว์ที่อยู่ร่วมกันเป็นฝูง จึงทำเมนูไก่ขึ้นโต๊ะเพื่อให้รักใครกลมเกลียวกัน</p>

    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-3">
            <center><img src="../../images/หลามบอน.jpg" style="height: 250px; width: 250px;"></center>
          </div>
          <div class="col-8" style="margin-top: 5%;">
            <h4>หลามบอน</h4>
            <p>การนำบอนมาปรุงอาหารโดยใช้ทั้งต้น ดอก และใบ มาปรุงกับเครื่องแกงและเครื่องปรุงโดยจะนำมาปรุงในกระบอกไม้ไผ่ จึงเรียกว่า "หลามบอน" แต่สมัยนี้มีการดัดแปลงมาปรุงในหม้อหรือกระทะ จึงมีการเรียกที่ต่างออกไปว่า "เอาะบอนหรือออมบอน"</p>
          </div>
        </div>
      </div>      
    </div>

    <div class="card">
      <div class="card-body">
        <div class="row">
         
          <div class="col-8" style="margin-top: 5%;">
            <h4>ห่อหมกดอกแค</h4>
            <p>การนำดอกแคป่ามาทำเป็นห่อหมกโดยส่วนผสมก็มีวิธีที่ปรุงต่างกันออกไปแล้วแต่พื้นที่ โดยจะดึงเอาเกษรของดอกออกก่อนจะทำเคื่องแกงแล้วนำไปกรอกใส่ดอกแคก่อนจะนำไปนึงบนเตาที่มีน้ำเดือดจัดประมาณ20-30 นาทีโดยห้ามเปิดฝาซึ้งจะทำให้ดอกแค่มีสีที่น่ากินแต่ถ้าเปิดไวดอกแคก็จะดำเกินไปจนไม่หน้ากิน</p>
          </div>
           <div class="col-3">
            <center><img src="../../images/ห่อหมกดอกแค.jpg" style="height: 250px; width: 250px;"></center>
          </div>
        </div>
      </div>      
    </div>

    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-3">
            <center><img src="../../images/แจ่วผีโพร่ง.jpg" style="height: 250px; width: 250px;"></center>
          </div>
          <div class="col-8" style="margin-top: 5%;">
            <h4>แจ่วผีโพร่ง</h4>
            <p>มีลักษณะคล้ายกับน้ำพริกหนุ่มแต่ต่างกันที่ใส่มะเขือเทศเผาและน้ำปลาร้าลงไปด้วย ผักที่ใช้กินแกล้มส่วนใหญ่จะเป็นผักสด จึงถูกเรียกว่าแจ่วผีโพร่ง</p>
          </div>
        </div>
      </div>      
    </div>

    <div class="card">
      <div class="card-body">
        <div class="row">
         
          <div class="col-8" style="margin-top: 5%;">
            <h4>หมอน้อยหรือหมาน้อย</h4>
            <p>เป็นพืชตระกูลเครือเป็นพืชแบบเรื่อยต้นและใบมีขนอ่อนนุ่ม เวลานำมาปรุงจะใช้การขยำกับน้ำจนค่อยๆเซ็ตตัวเหมือนกับเฉาก๊วย แตกต่างกันที่สีเฉาก๊วยจะเป็นสีดำ แต่หมาน้อยจะเป็นสีเขียวขี้ม้า นำมาปรุงได้ทั้งคาวและหวาน</p>
          </div>
           <div class="col-3">
            <center><img src="../../images/หมอน้อยหรือหมาน้อย.jpg" style="height: 250px; width: 250px;"></center>
          </div>
        </div>
      </div>      
    </div>

    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-3">
            <center><img src="../../images/ห่อหมกหน่อไม้.jpg" style="height: 250px; width: 250px;"></center>
          </div>
          <div class="col-8" style="margin-top: 5%;">
            <h4>ห่อหมกหน่อไม้</h4>
            <p>อีกหนึ่งเมนูที่เป็นอาหารพื้นบ้านที่มีวิธีปรุงแตกต่างกันแล้วแต่ละชุมชน แต่ก่อนนำหน่อไม้มาปรุงส่วนใหญ่จะใช้การต้มกับใบหญ้านางเพื่อเป็นการลดกรดของหน่อไม้</p>
          </div>
        </div>
      </div>      
    </div>

    <div class="card">
      <div class="card-body">
        <div class="row">
         
          <div class="col-8" style="margin-top: 5%;">
            <h4>ต้มไก่ใส่หยวกกล้วย</h4>
            <p>เป็นเมนูที่ใช้การปรุงแบบค้มข่าไก่แต่เปลี่ยนจากผักชนิดอื่นมาเป็นหยวกกล้วยแทน และถ้าเป็นหยวกกล้วยป่าด้วยแล้วจะมีความนุ่มและอร่อยกว่ากล้วยพันธุ์อื่นๆแน่นอน</p>
          </div>
           <div class="col-3">
            <center><img src="../../images/ต้มไก่ใส่หยวกกล้วย.jpg" style="height: 250px; width: 250px;"></center>
          </div>
        </div>
      </div>      
    </div>

    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-3">
            <center><img src="../../images/ก๋วยเตี๊ยวหน่อ.jpg" style="height: 250px; width: 250px;"></center>
          </div>
          <div class="col-8" style="margin-top: 5%;">
            <h4>ก๋วยเตี๊ยวหน่อ</h4>
            <p>การปรุงคล้ายกับกระเพาะปลาแต่จะไม่ใช้กระเพราปลาแต่เป็นหน่อไม้แทนในหม้าที่เคี้ยวจะหัดหมูที่ต้มเป็นชิ้นเล็กๆ หั่นไข่ที่ต้มเป็นชิ้นเล็กๆลงไปในหมอเลยการกินก็คล้ายกันจะใส่เส้นหรือไม่ใส่ก็ได้</p>
          </div>
        </div>
      </div>      
    </div>

  
  <div class="mt-5"></div>
</div>



</body>
</html>