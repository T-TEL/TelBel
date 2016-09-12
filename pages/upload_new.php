<?php include_once('../secure/talk2db.php');include_once('../secure/functions.php');?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>T-Tel</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<?php
if(!function_exists('mime_content_type')) {

    function mime_content_type($filename) {

        $mime_types = array(
            'txt' => 'text/plain',
            'htm' => 'text/html',
            'html' => 'text/html',
            'php' => 'text/html',
            'css' => 'text/css',
            'js' => 'application/javascript',
            'json' => 'application/json',
            'xml' => 'application/xml',
            'swf' => 'application/x-shockwave-flash',
            'flv' => 'video/x-flv',

            // images
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp',
            'ico' => 'image/vnd.microsoft.icon',
            'tiff' => 'image/tiff',
            'tif' => 'image/tiff',
            'svg' => 'image/svg+xml',
            'svgz' => 'image/svg+xml',

            // archives
            'zip' => 'application/zip',
            'rar' => 'application/x-rar-compressed',
            'exe' => 'application/x-msdownload',
            'msi' => 'application/x-msdownload',
            'cab' => 'application/vnd.ms-cab-compressed',

            // audio/video
            'mp3' => 'audio/mpeg',
            'qt' => 'video/quicktime',
            'mov' => 'video/quicktime',

            // adobe
            'pdf' => 'application/pdf',
            'psd' => 'image/vnd.adobe.photoshop',
            'ai' => 'application/postscript',
            'eps' => 'application/postscript',
            'ps' => 'application/postscript',

            // ms office
            'doc' => 'application/msword',
            'rtf' => 'application/rtf',
            'xls' => 'application/vnd.ms-excel',
            'ppt' => 'application/vnd.ms-powerpoint',

            // open office
            'odt' => 'application/vnd.oasis.opendocument.text',
            'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
        );

        $ext = strtolower(array_pop(explode('.',$filename)));
        if (array_key_exists($ext, $mime_types)) {
            return $mime_types[$ext];
        }
        elseif (function_exists('finfo_open')) {
            $finfo = finfo_open(FILEINFO_MIME);
            $mimetype = finfo_file($finfo, $filename);
            finfo_close($finfo);
            return $mimetype;
        }
        else {
            return 'application/octet-stream';
        }
    }
}
?>
<?php

if(isset($_POST['title']))
{
	if($_POST['title']!=""){
		global $couchUrl;
		global $facilityId;
		$resources = new couchClient($couchUrl, "ttel_resources");
		$doc = new stdClass();
		$docType = end(explode(".", $_FILES['uploadedfile']['name']));
		$doc->legacy = array(
		"id"=>"",
		"type"=> strtolower($docType)
		);
		$doc->type=$_POST['resType'];
		$doc->kind='Resource';
		$doc->language = $_POST['Language'];
		$doc->description=$_POST['discription'];
		$doc->title=$_POST['title'];
		$doc->author=$_POST['author'];
		$doc->subject=$_POST['subject'];
		/*$doc->created=$_POST['systemDateForm'];*/
		$audData = array();
		foreach($_POST['targetedAudience'] as $audience){
			array_push($audData,$audience);
		}
		$doc->audience = $audData;
		/*$resLevels = array();
		foreach($_POST['resLevel'] as $levels){
			array_push($resLevels,$levels);
		}
		$doc->levels = $resLevels;*/
		/*if($doc->type=="video lesson"){
			$doc->questions= (object)array();
		}*/
		$responce = $resources->storeDoc($doc);
		print_r($responce);
		try {
			// add attached to document with specified id from response
			$fileName = $responce->id.'.'.end(explode(".", $_FILES['uploadedfile']['name']));
			$resources->storeAttachment($resources->getDoc($responce->id),$_FILES['uploadedfile']['tmp_name'], mime_content_type($_FILES['uploadedfile']['tmp_name']),$fileName);
		} catch ( Exception $e ) {
			print ("No Resource was uploaded<br>");
		}
		$resDoc = $resources->getDoc($responce->id);
		$resDoc->legacy->id = $responce->id;
		$resources->storeDoc($resDoc);
		
		echo '<script type="text/javascript">alert("Successfully Uploaded '.$_POST['title'].'");</script>';
	  die('<span style="color:#FFF"><br><br><br><br>Successfully saved - '.$_POST['title'].'<br><br>'. $responce->id);
		}
  
} 
?>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <div class="row"  style="background-color:rgb(239, 62, 60);"><img src="../images/Ttel_banner.jpg" width="360" height="108" alt="T-Tel"></div>
        <div id="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="color:#FFF">Upload Material / Resource</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                      <div class="panel-body">
                          <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="" method="post" enctype="multipart/form-data" name="form1">
                                     <div class="form-group">
                                            <label>Subject Area</label>
                                            <select class="form-control" name="subject" id="subject">
                                                <option value="englsih">English</option>
                                                <option value="mathematics">Mathematics</option>
                                                <option value="science">Science</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        
                                    
                                        
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" id="title"  placeholder="Resource title here.">
                                        </div>
                                          <div class="form-group">
                                            <label>Targeted Audience</label>
                                            <div class="checkbox">
                                                <label>
                                                   <input type="checkbox" name="targetedAudience[]" value="teacher training" id="targetedAudience_0">Teacher Training
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" name="targetedAudience[]" value="health" id="targetedAudience_1">
              Health
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" name="targetedAudience[]" value="community education" id="targetedAudience_2">
Community Education
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" name="targetedAudience[]" value="formal education" id="targetedAudience_3">
              Formal Education
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>File input</label>
                                            <input  name="uploadedfile" type="file">
                                        </div>
                                        <button type="submit" name="SendVBQuestions" class="btn btn-danger">Submit Button</button>
                                        
                                    </form>
                                </div>
                                
                                <div class="col-lg-6">
                  <div class="form-group">             
                                  <label>Language</label>      
                                        <select class="form-control"  name="Language" id="Language">
          <option value='aa'>Afar</option>
         <option value='ab'>Abkhazian</option>
         <option value='af'>Afrikaans</option>
         <option value='ak'>Akan</option>
         <option value='sq'>Albanian</option>
         <option value='am'>Amharic</option>
         <option value='ar'>Arabic</option>
         <option value='an'>Aragonese</option>
         <option value='hy'>Armenian</option>
         <option value='as'>Assamese</option>
         <option value='av'>Avaric</option>
         <option value='ae'>Avestan</option>
         <option value='ay'>Aymara</option>
         <option value='az'>Azerbaijani</option>
         <option value='ba'>Bashkir</option>
         <option value='bm'>Bambara</option>
         <option value='eu'>Basque</option>
         <option value='be'>Belarusian</option>
         <option value='bn'>Bengali</option>
         <option value='bh'>Bihari</option>
         <option value='bi'>Bislama</option>
         <option value='bo'>Tibetan</option>
         <option value='bs'>Bosnian</option>
         <option value='br'>Breton</option>
         <option value='bg'>Bulgarian</option>
         <option value='my'>Burmese</option>
         <option value='ca'>Catalan</option>
         <option value='ca'>Valencian</option>
         <option value='cs'>Czech</option>
         <option value='ch'>Chamorro</option>
         <option value='ce'>Chechen</option>
         <option value='zh'>Chinese</option>
         <option value='cu'>Church Slavic</option>
         <option value='cu'>Old Slavonic</option>
         <option value='cu'>Church Slavonic</option>
         <option value='cu'>Old Bulgarian;</option>
         <option value='cu'>Old Church Slavonic</option>
         <option value='cv'>Chuvash</option>
         <option value='kw'>Cornish</option>
         <option value='co'>Corsican</option>
         <option value='cr'>Cree</option>
         <option value='cy'>Welsh</option>
         <option value='da'>Danish</option>
         <option value='de'>German</option>
         <option value='dv'>Divehi</option>
         <option value='dv'>Dhivehi</option>
         <option value='dv'>Maldivian</option>
         <option value='nl'>Dutch; Flemish</option>
         <option value='dz'>Dzongkha</option>
         <option value='en' selected>English</option>
         <option value='eo'>Esperanto</option>
         <option value='et'>Estonian</option>
         <option value='ee'>Ewe</option>
         <option value='fo'>Faroese</option>
         <option value='fa'>Persian</option>
         <option value='fj'>Fijian</option>
         <option value='fi'>Finnish</option>
         <option value='fr'>French</option>
         <option value='fy'>Western Frisian</option>
         <option value='ff'>Fulah</option>
         <option value='ka'>Georgian</option>
         <option value='gd'>Gaelic</option>
         <option value='gd'>Scottish Gaelic</option>
         <option value='ga'>Irish</option>
         <option value='gl'>Galician</option>
         <option value='gv'>Manx</option>
         <option value='el'>Greek</option>
         <option value='gn'>Guarani</option>
         <option value='gu'>Gujarati</option>
         <option value='ht'>Haitian</option>
         <option value='ht'>Haitian Creole</option>
         <option value='ha'>Hausa</option>
         <option value='he'>Hebrew</option>
         <option value='hz'>Herero</option>
         <option value='hi'>Hindi</option>
         <option value='ho'>Hiri Motu</option>
         <option value='hr'>Croatian</option>
         <option value='hu'>Hungarian</option>
         <option value='ig'>Igbo</option>
         <option value='is'>Icelandic</option>
         <option value='io'>Ido</option>
         <option value='ii'>Sichuan Yi</option>
         <option value='iu'>Inuktitut</option>
         <option value='ie'>Interlingue</option>
         <option value='ia'>Interlingua</option>
         <option value='id'>Indonesian</option>
         <option value='ik'>Inupiaq</option>
         <option value='it'>Italian</option>
         <option value='jv'>Javanese</option>
         <option value='ja'>Japanese</option>
         <option value='kl'>Kalaallisut</option>
         <option value='kl'>Greenlandic</option>
         <option value='kn'>Kannada</option>
         <option value='ks'>Kashmiri</option>
         <option value='kr'>Kanuri</option>
         <option value='kk'>Kazakh</option>
         <option value='km'>Central Khmer</option>
         <option value='ki'>Kikuyu</option>
         <option value='ki'>Gikuyu</option>
         <option value='rw'>Kinyarwanda</option>
         <option value='ky'>Kirghiz</option>
         <option value='ky'>Kyrgyz</option>
         <option value='kv'>Komi</option>
         <option value='kg'>Kongo</option>
         <option value='ko'>Korean</option>
         <option value='kj'>Kuanyama</option>
         <option value='kj'>Kwanyama</option>
         <option value='ku'>Kurdish</option>
         <option value='lo'>Lao</option>
         <option value='la'>Latin</option>
         <option value='lv'>Latvian</option>
         <option value='li'>Limburgan</option>
         <option value='li'>Limburger</option>
         <option value='li'>Limburgish</option>
         <option value='ln'>Lingala</option>
         <option value='lt'>Lithuanian</option>
         <option value='lb'>Luxembourgish</option>
         <option value='lb'>Letzeburgesch</option>
         <option value='lu'>Luba-Katanga</option>
         <option value='lg'>Ganda</option>
         <option value='mk'>Macedonian</option>
         <option value='mh'>Marshallese</option>
         <option value='ml'>Malayalam</option>
         <option value='mi'>Maori</option>
         <option value='mr'>Marathi</option>
         <option value='ms'>Malay</option>
         <option value='mg'>Malagasy</option>
         <option value='mt'>Maltese</option>
         <option value='mo'>Moldavian</option>
         <option value='mn'>Mongolian</option>
         <option value='na'>Nauru</option>
         <option value='nv'>Navajo</option>
         <option value='nv'>Navaho</option>
         <option value='nr'>Ndebele South</option>
         <option value='nr'>South Ndebele</option>
         <option value='nr'>Ndebele North</option>
         <option value='nd'>North Ndebele</option>
         <option value='ng'>Ndonga</option>
         <option value='ne'>Nepali</option>
         <option value='nl'>Dutch</option>
         <option value='nn'>Norwegian Nynorsk</option>
         <option value='nn'>Nynorsk Norwegian</option>
         <option value='nb'>Bokmål Norwegian</option>
         <option value='nb'>Norwegian Bokmål</option>
         <option value='no'>Norwegian</option>
         <option value='ny'>Chichewa</option>
         <option value='ny'>Nyanja</option>
         <option value='oc'>Occitan </option>
         <option value='oc'>Provençal</option>
         <option value='oj'>Ojibwa</option>
         <option value='or'>Oriya</option>
         <option value='om'>Oromo</option>
         <option value='os'>Ossetian</option>
         <option value='os'>Ossetic</option>
         <option value='pa'>Panjabi</option>
         <option value='pa'>Punjabi</option>
         <option value='pi'>Pali</option>
         <option value='pl'>Polish</option>
         <option value='pt'>Portuguese</option>
         <option value='ps'>Pushto</option>
         <option value='qu'>Quechua</option>
         <option value='rm'>Romansh</option>
         <option value='ro'>Romanian</option>
         <option value='rn'>Rundi</option>
         <option value='ru'>Russian</option>
         <option value='sg'>Sango</option>
         <option value='sa'>Sanskrit</option>
         <option value='sr'>Serbian</option>
         <option value='si'>Sinhala</option>
         <option value='si'>Sinhalese</option>
         <option value='sk'>Slovak</option>
         <option value='sl'>Slovenian</option>
         <option value='se'>Northern Sami</option>
         <option value='sm'>Samoan</option>
         <option value='sn'>Shona</option>
         <option value='sd'>Sindhi</option>
         <option value='so'>Somali</option>
         <option value='st'>Sotho Southern</option>
         <option value='es'>Spanish</option>
         <option value='es'>Castilian</option>
         <option value='sc'>Sardinian</option>
         <option value='ss'>Swati</option>
         <option value='su'>Sundanese</option>
         <option value='sw'>Swahili</option>
         <option value='sv'>Swedish</option>
         <option value='ty'>Tahitian</option>
         <option value='ta'>Tamil</option>
         <option value='tt'>Tatar</option>
         <option value='te'>Telugu</option>
         <option value='tg'>Tajik</option>
         <option value='tl'>Tagalog</option>
         <option value='th'>Thai</option>
         <option value='ti'>Tigrinya</option>
         <option value='to'>Tonga </option>
         <option value='to'>Tonga Islands</option>
         <option value='tn'>Tswana</option>
         <option value='ts'>Tsonga</option>
         <option value='tk'>Turkmen</option>
         <option value='tr'>Turkish</option>
         <option value='tw'>Twi</option>
         <option value='ug'>Uighur</option>
         <option value='ug'>Uyghur</option>
         <option value='uk'>Ukrainian</option>
         <option value='ur'>Urdu</option>
         <option value='uz'>Uzbek</option>
         <option value='ve'>Venda</option>
         <option value='vi'>Vietnamese</option>
         <option value='vo'>Volapük</option>
         <option value='wa'>Walloon</option>
         <option value='wo'>Wolof</option>
         <option value='xh'>Xhosa</option>
         <option value='yi'>Yiddish</option>
         <option value='yo'>Yoruba</option>
         <option value='za'>Zhuang Chuang</option>
         <option value='zu'>Zulu</option>
          <option value='AsT'>Asante Twi</option>
          <option value='AkT'>Akuapem Twi</option>
          <option value='Ew'>Ewe</option>
          <option value='Ga'>Ga</option>
          <option value='Mfts'>Mfantse</option>
     </select>
     </div>
     
     
       
                                    <div class="form-group">
                                            <label>Type</label>
                                            <select name="resType"  class="form-control" id="resType">
                                                <option value="ePub">ePub</option>
                                                <option value="Zip">Zip</option>
                                                <option value="Pdf" selected>Pdf</option>
                                                <option value="Docx">Docx</option>
                                                <option value="MP4">MP4</option>
                                                <option value="MP3">MP3</option>
                                            </select>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label>Remark / Description</label>
                                            <textarea class="form-control" rows="4" name="description" id="description" ></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Author</label>
                                            <input class="form-control" name="author" id="author"  placeholder="Resource author.">
                                        </div>
                            
                                        
     
     </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
                
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
