import $$ from 'dom7';
import Framework7 from 'framework7/framework7.esm.bundle.js';

// Import F7 Styles
import 'framework7/css/framework7.bundle.css';

// Import Icons and App Custom Styles
import '../css/icons.css';
import '../css/app.css';
// Import Cordova APIs
import cordovaApp from './cordova-app.js';
// Import Routes
import routes from './routes.js';

// Import main app component
import App from '../app.f7.html';

var app = new Framework7({
  root: '#app', // App root element
  component: App, // App main component
  id: 'tedeco.equipment.app', // App bundle ID
  name: 'TeDeCo Equipment', // App name
  theme: 'md', // Automatic theme detection
  data: function () {
    return {
      user: {
		id:"",
		roles:"",
    glav:"",
    idh:"0"
      },
      token:"",
    url:"",
    version:"1.0.4"
    };
  },
  // App root methods
  methods: {
    helloWorld: function () {
      app.dialog.alert('Hello World!');
    },
    home: {
       users:function(){
          app.request.get('https://tedeco.kz/equipment/api/zayavka.php',{zapros:'list',id:app.data.user.id,glav:app.data.user.glav,roles:app.data.user.roles},function(notifi){                                          							
      app.preloader.hide();
      /*setTimeout(function(){
        users();
        },10000);*/
      //console.log(notifi);
      var bad_new=0,bad_active=0,bad_pod=0,bad_pod_admin=0;
          var ht1 ="",ht2 ="",ht3 ="",ht4 ="",ht5 ="",ht6 ="";
    if (notifi.length>=1){
      for (var s = 0; s<notifi.length; s++)
      if (notifi[s].active==="0"){
      ht1+='<div data-id ="'+notifi[s].id+'" name="'+notifi[s].id_db+'" value="0" class="card"><div class="card-header" name="'+notifi[s].id_db+'" value="0" data-id ="'+notifi[s].id+'"><i>Заявка</i> № '+notifi[s].id+'<font color="red">Новая</font></div>'+
      '<div data-id ="'+notifi[s].id+'" value="0"name="'+notifi[s].id_db+'"  class="card-content card-content-padding"><center><b>'+notifi[s].name+'</b></center><br><b>id: </b> '+notifi[s].id_db+'<br><b>Вид неисправности: </b> '+notifi[s].status+'<br><b>Расположение: </b> '+notifi[s].company+', '+notifi[s].place+'<br><b>Врач: </b> '+notifi[s].vrach+'<br></div>'+
    '<div data-id ="'+notifi[s].id+'" value="0"name="'+notifi[s].id_db+'"  class="card-footer color-black">'+notifi[s].data+'<div class="right" style="display:none"><a data-id ="'+notifi[s].id+'" value="2" class="button button-fill color-green">Принять</a></div></div></div>';
    bad_new++;
      }else
    if (notifi[s].active==="1"){
      bad_active++;
    ht2+='<div value="1" name="'+notifi[s].id_db+'" data-id ="'+notifi[s].id+'" class="card"><div class="card-header" name="'+notifi[s].id_db+'" value="1" data-id ="'+notifi[s].id+'">Заявка № '+notifi[s].id+'<font color="#408ac7">Активные</font></div>'+
    '<div data-id ="'+notifi[s].id+'" value="0"name="'+notifi[s].id_db+'"  class="card-content card-content-padding">'+notifi[s].name+'<br><b>id: </b> '+notifi[s].id_db+'<br><b>Вид неисправности: </b> '+notifi[s].status+'<br><b>Расположение: </b> '+notifi[s].company+', '+notifi[s].place+'<br><b>Врач: </b> '+notifi[s].vrach+'<br><b>Инженер: </b>'+notifi[s].ispol+'</div>'+
    '<div value="1" name="'+notifi[s].id_db+'" data-id ="'+notifi[s].id+'" class="card-footer"><font color="black">'+notifi[s].data+'</font><div class="right">Куратор: '+notifi[s].kurator+'</div><div class="right" style="display:none"><a name="'+notifi[s].id_db+'" data-id ="'+notifi[s].id+'" value="4" class="button button-fill color-green">Начать ремонт</a></div></div></div>';
    }else
    if (notifi[s].active==="7"){
    ht3+='<div value="1" name="'+notifi[s].id_db+'" data-id ="'+notifi[s].id+'" class="card"><div class="card-header" name="'+notifi[s].id_db+'" value="1" data-id ="'+notifi[s].id+'">Заявка № '+notifi[s].id+'<font color="#408ac7">Активные</font></div>'+
    '<div data-id ="'+notifi[s].id+'" value="0"name="'+notifi[s].id_db+'"  class="card-content card-content-padding">'+notifi[s].name+'<br><b>id: </b> '+notifi[s].id_db+'<br><b>Вид неисправности: </b> '+notifi[s].status+'<br><b>Расположение: </b> '+notifi[s].company+', '+notifi[s].place+'<br><b>Врач: </b> '+notifi[s].vrach+'<br><b>Инженер: </b>'+notifi[s].ispol+'</div>'+
    '<div value="1" name="'+notifi[s].id_db+'" data-id ="'+notifi[s].id+'" class="card-footer"><font color="black">'+notifi[s].data+'</font><div class="right">Куратор: '+notifi[s].kurator+'</div><div class="right" style="display:none"><a name="'+notifi[s].id_db+'" data-id ="'+notifi[s].id+'" value="3" class="button button-fill color-green">Завершить</a></div></div></div>';
    bad_active++;
    }else
    if (notifi[s].active==="2"){
    ht4+='<div value="1" name="'+notifi[s].id_db+'" data-id ="'+notifi[s].id+'" class="card"><div class="card-header" name="'+notifi[s].id_db+'" value="1" data-id ="'+notifi[s].id+'">Заявка № '+notifi[s].id+'<font color="#408ac7">Ожидание</font></div>'+
    '<div data-id ="'+notifi[s].id+'" value="0"name="'+notifi[s].id_db+'"  class="card-content card-content-padding">'+notifi[s].name+'<br><b>id: </b> '+notifi[s].id_db+'<br><b>Вид неисправности: </b> '+notifi[s].status+'<br><b>Расположение: </b> '+notifi[s].company+', '+notifi[s].place+'<br><b>Врач: </b> '+notifi[s].vrach+'<br><b>Инженер: </b>'+notifi[s].ispol+'</div>'+
    '<div value="1" name="'+notifi[s].id_db+'" data-id ="'+notifi[s].id+'" class="card-footer"><font color="black">'+notifi[s].data+'</font><div class="right">Куратор: '+notifi[s].kurator+'</div><div class="right" style="display:none">Ожидание подтверждения</div></div></div>';
    bad_pod++;
    }else
    if (notifi[s].active==="8"){
    ht5+='<div value="1" name="'+notifi[s].id_db+'" data-id ="'+notifi[s].id+'" class="card"><div class="card-header" name="'+notifi[s].id_db+'" value="1" data-id ="'+notifi[s].id+'">Заявка № '+notifi[s].id+'<font color="#408ac7">Ожидание зап. части</font></div>'+
    '<div data-id ="'+notifi[s].id+'" value="0"name="'+notifi[s].id_db+'"  class="card-content card-content-padding">'+notifi[s].name+'<br><b>id: </b> '+notifi[s].id_db+'<br><b>Вид неисправности: </b> '+notifi[s].status+'<br><b>Расположение: </b> '+notifi[s].company+', '+notifi[s].place+'<br><b>Врач: </b> '+notifi[s].vrach+'<br><b>Инженер: </b>'+notifi[s].ispol+'</div>'+
    '<div value="1" name="'+notifi[s].id_db+'" data-id ="'+notifi[s].id+'" class="card-footer"><font color="black">'+notifi[s].data+'</font><div class="right">Куратор: '+notifi[s].kurator+'</div><div class="right" style="display:none"><a name="'+notifi[s].id_db+'" data-id ="'+notifi[s].id+'" value="3" class="button button-fill color-green">Завершить</a></div></div></div>';
    bad_active++;
    }else
    if (notifi[s].active==="4"){
    ht6+='<div value="1" name="'+notifi[s].id_db+'" data-id ="'+notifi[s].id+'" class="card"><div class="card-header" name="'+notifi[s].id_db+'" value="1" data-id ="'+notifi[s].id+'">Заявка № '+notifi[s].id+'<font color="#408ac7">Ожидание</font></div>'+
    '<div data-id ="'+notifi[s].id+'" value="0"name="'+notifi[s].id_db+'"  class="card-content card-content-padding">'+notifi[s].name+'<br><b>id: </b> '+notifi[s].id_db+'<br><b>Вид неисправности: </b> '+notifi[s].status+'<br><b>Расположение: </b> '+notifi[s].company+', '+notifi[s].place+'<br><b>Врач: </b> '+notifi[s].vrach+'<br><b>Инженер: </b>'+notifi[s].ispol+'</div>'+
    '<div value="1" name="'+notifi[s].id_db+'" data-id ="'+notifi[s].id+'" class="card-footer"><font color="black">'+notifi[s].data+'</font><div class="right">Куратор: '+notifi[s].kurator+'</div><div class="right" style="display:none">Ожидание подтверждения</div></div></div>';
    bad_pod_admin++;
    }//if (ht1=="" && ht2=="" && ht3=="" && ht4=="" && ht5=="" && ht6=="")$$('#virt_home').html('Ничего нет')
    //else
    $$('#virt_home_new').html(ht1);
    if (bad_new==0)$$("#bad_new").hide(); else $$("#bad_new").show();
    $$("#bad_new").text(bad_new);
    $$('#virt_home_active').html(ht2+ht3+ht5);
    if (bad_active==0)$$("#bad_active").hide(); else $$("#bad_active").show();
    $$("#bad_active").text(bad_active);
    $$('#virt_home_pod').html(ht4);
    if (bad_pod==0)$$("#bad_pod").hide(); else $$("#bad_pod").show();
    $$("#bad_pod").text(bad_pod);
    $$('#virt_home_pod_admin').html(ht6);
    if (bad_pod_admin==0)$$("#bad_pod_admin").hide(); else $$("#bad_pod_admin").show();
    $$("#bad_pod_admin").text(bad_pod_admin);
    }
    else
    $$('#virt_home').html('Ничего нет');
     },function(){
      app.preloader.hide();
      app.dialog.alert('Нет подключения к интернету');
      },'json');
      
      },
      timers:function(){
          app.request.get('https://tedeco.kz/equipment/api/notifi.php',{zapros:'active',id:app.data.user.id},function(notifi){
      if (notifi.length>=1){
        $$('#notifi').show();
        $$('#notifi').text(notifi.length);
      }
      else
      $$('#notifi').hide();
       },function(){
        app.preloader.hide();
        app.dialog.alert('Нет подключения к интернету');
        },'json');  
      }
        
    },
    sklad:{
      sklad:function(){
        app.request.post('https://tedeco.kz/equipment/api/add_sklady.php',{zapros:'list',typ:"moi_user",id_user:app.data.user.id},function(sklad){                                          							
          app.preloader.hide();
          if (sklad.length>=1){
           var text_sklad ="";
for (var t=0; t<sklad.length; t++){
  var text_tovar="";
  for (var t2=0; t2<sklad[t].tovary.length; t2++)
  text_tovar+='<tr>'+
  '<td class="label-cell">'+sklad[t].tovary[t2].name_tovar+'</td>'+
   '<td class="numeric-cell">'+sklad[t].tovary[t2].col+'</td>'+
 '</tr>';
   text_sklad += '<li class="accordion-item"><a href="#" class="item-content item-link">'+
  '<div class="item-inner">'+
    '<div class="item-title">'+sklad[t].name_sklad+'</div>'+
    '</div></a>'+
'<div class="accordion-item-content">'+
'<div class="data-table data-table-init"  style="--f7-card-border-radius: 0px;">'+
  '<table>'+
              '<thead>'+
                '<tr>'+
                  ' <th class="label-cell">Название</th>'+
                    ' <th class="label-cell">Количество</th>'+
        ' </tr>'+
                  '</thead>'+
                '<tbody>'+text_tovar+
                '</tbody>'+
                ' </table>'+
              ' </div>'+
          '</div>'+
'</li>';

$$('#moi_sklad').html(text_sklad);
}


          }

      },'json');
      },
      zayavki:function(){
        app.request.post('https://tedeco.kz/equipment/api/zayavka_t.php',{zapros:'list',id_user:app.data.user.id},function(notifi){                                          							
          app.preloader.hide();
          var bad_sklad_new=0,bad_sklad_active=0,bad_sklad_ot=0,bad_sklad_dos=0;
              var ht1 ="",ht2 ="",ht3 ="",ht4 ="";
        if (notifi.length>=1){
          for (var s = 0; s<notifi.length; s++)
          if (notifi[s].active==="0"){
          ht1+='<div data-id ="'+notifi[s].id_zayavka+'" name="'+notifi[s].id_bd+'" type="'+notifi[s].type+'" z-id ="'+notifi[s].id+'" value="0" class="card"><div class="card-header" value="0" name="'+notifi[s].id_bd+'" type="'+notifi[s].type+'" z-id ="'+notifi[s].id+'" data-id ="'+notifi[s].id_zayavka+'"><i>Заявка</i> № '+notifi[s].id_zayavka+'<font color="red">Новая</font></div>'+
          '<div data-id ="'+notifi[s].id_zayavka+'" name="'+notifi[s].id_bd+'" type="'+notifi[s].type+'" z-id ="'+notifi[s].id+'" value="0" class="card-content card-content-padding"><b>Расположение: </b> '+notifi[s].company+', '+notifi[s].place_name+'<br><b>Исполнитель: </b> '+notifi[s].ispol+'<br></div>'+
        '<div data-id ="'+notifi[s].id_zayavka+'" name="'+notifi[s].id_bd+'" type="'+notifi[s].type+'" z-id ="'+notifi[s].id+'" value="0" class="card-footer color-black">'+notifi[s].data+'</div></div>';
        bad_sklad_new++;
          }
          else
          if (notifi[s].active==="1"){
            ht2+='<div data-id ="'+notifi[s].id_zayavka+'" type="'+notifi[s].type+'" z-id ="'+notifi[s].id+'" name="'+notifi[s].id_bd+'" value="0" class="card"><div class="card-header" value="0" type="'+notifi[s].type+'" z-id ="'+notifi[s].id+'" name="'+notifi[s].id_bd+'" data-id ="'+notifi[s].id_zayavka+'"><i>Заявка</i> № '+notifi[s].id_zayavka+'<font color="red">Активная</font></div>'+
            '<div data-id ="'+notifi[s].id_zayavka+'" type="'+notifi[s].type+'" z-id ="'+notifi[s].id+'" name="'+notifi[s].id_bd+'" value="0" class="card-content card-content-padding"><b>Расположение: </b> '+notifi[s].company+', '+notifi[s].place_name+'<br><b>Исполнитель: </b> '+notifi[s].ispol+'<br></div>'+
          '<div data-id ="'+notifi[s].id_zayavka+'" type="'+notifi[s].type+'" z-id ="'+notifi[s].id+'" name="'+notifi[s].id_bd+'" value="0" class="card-footer color-black">'+notifi[s].data+'</div></div>';
          bad_sklad_active++;
            }
            else
          if (notifi[s].active==="2"){
            ht3+='<div data-id ="'+notifi[s].id_zayavka+'" type="'+notifi[s].type+'" z-id ="'+notifi[s].id+'" name="'+notifi[s].id_bd+'" value="0" class="card"><div class="card-header" value="0" type="'+notifi[s].type+'" z-id ="'+notifi[s].id+'" name="'+notifi[s].id_bd+'" data-id ="'+notifi[s].id_zayavka+'"><i>Заявка</i> № '+notifi[s].id_zayavka+'<font color="red">Отправлено</font></div>'+
            '<div data-id ="'+notifi[s].id_zayavka+'" type="'+notifi[s].type+'" z-id ="'+notifi[s].id+'" name="'+notifi[s].id_bd+'" value="0" class="card-content card-content-padding"><b>Расположение: </b> '+notifi[s].company+', '+notifi[s].place_name+'<br><b>Исполнитель: </b> '+notifi[s].ispol+'<br></div>'+
          '<div data-id ="'+notifi[s].id_zayavka+'" type="'+notifi[s].type+'" z-id ="'+notifi[s].id+'" name="'+notifi[s].id_bd+'" value="0" class="card-footer color-black">'+notifi[s].data+'</div></div>';
          bad_sklad_ot++;
            }
            else
            if (notifi[s].active==="3"){
              ht4+='<div data-id ="'+notifi[s].id_zayavka+'" type="'+notifi[s].type+'" z-id ="'+notifi[s].id+'" name="'+notifi[s].id_bd+'" value="0" class="card"><div class="card-header" value="0" type="'+notifi[s].type+'" z-id ="'+notifi[s].id+'" name="'+notifi[s].id_bd+'" data-id ="'+notifi[s].id_zayavka+'"><i>Заявка</i> № '+notifi[s].id_zayavka+'<font color="red">Доставлено</font></div>'+
              '<div data-id ="'+notifi[s].id_zayavka+'" type="'+notifi[s].type+'" z-id ="'+notifi[s].id+'" name="'+notifi[s].id_bd+'" value="0" class="card-content card-content-padding"><b>Расположение: </b> '+notifi[s].company+', '+notifi[s].place_name+'<br><b>Исполнитель: </b> '+notifi[s].ispol+'<br></div>'+
            '<div data-id ="'+notifi[s].id_zayavka+'" type="'+notifi[s].type+'" z-id ="'+notifi[s].id+'" name="'+notifi[s].id_bd+'" value="0" class="card-footer color-black">'+notifi[s].data+'</div></div>';
            bad_sklad_dos++;
              }
        $$('#sklad_new').html(ht1);
        if (bad_sklad_new==0)$$("#bad_sklad_new").hide(); else $$("#bad_sklad_new").show();
        $$("#bad_sklad_new").text(bad_sklad_new);

        $$('#sklad_active').html(ht2);
        if (bad_sklad_active==0)$$("#bad_sklad_active").hide(); else $$("#bad_sklad_active").show();
        $$("#bad_sklad_active").text(bad_sklad_active);

        $$('#sklad_otp').html(ht3);
        if (bad_sklad_ot==0)$$("#bad_sklad_ot").hide(); else $$("#bad_sklad_ot").show();
        $$("#bad_sklad_ot").text(bad_sklad_ot);

        $$('#sklad_dos').html(ht4);
        if (bad_sklad_dos==0)$$("#bad_sklad_dos").hide(); else $$("#bad_sklad_dos").show();
        $$("#bad_sklad_dos").text(bad_sklad_dos);
        }
        else
        {
          $$('#sklad_new').html("");
        bad_sklad_new=0;
        $$("#bad_sklad_new").hide();
        $$('#sklad_active').html("");
        bad_sklad_active=0;
        $$("#bad_sklad_active").hide();
        $$('#sklad_otp').html("");
        bad_sklad_ot=0;
        $$("#bad_sklad_ot").hide();
        $$('#sklad_dos').html("");
        bad_sklad_dos=0;
        $$("#bad_sklad_dos").hide();
        }
         },function(){
          app.preloader.hide();
          app.dialog.alert('Нет подключения к интернету');
          },'json');
      }
    },
  },
  // App routes
  routes: routes,



  // Input settings
  input: {
    scrollIntoViewOnFocus: Framework7.device.cordova && !Framework7.device.electron,
    scrollIntoViewCentered: Framework7.device.cordova && !Framework7.device.electron,
  },
  // Cordova Statusbar settings
  statusbar: {
    overlay: Framework7.device.cordova && Framework7.device.ios || 'auto',
    iosOverlaysWebView: true,
    androidOverlaysWebView: false,
iosBackgroundColor:'#507da2',
iosTextColor:'white',
  },
  on: {
    init: function () {
      var f7 = this;
      
      if (f7.device.cordova) {
        // Init cordova APIs (see cordova-app.js)
        cordovaApp.init(f7);
    
      }
    },
  },
});


