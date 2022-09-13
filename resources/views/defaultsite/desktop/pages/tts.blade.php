@extends('defaultsite.desktop.layouts.main')

@push('styles')

<style>
    #wordentry,#wordlabel{font-family:Consolas,monospace;letter-spacing:.5em;text-transform:uppercase}#ecw-infoarea,.clues a,.tts-wrapper .bod{position:relative}#kotak-tts input,.ecw-box{cursor:pointer;text-align:center;font-weight:700}#kotak-tts input,#wordentry,#wordlabel{text-transform:uppercase}#CSroVkUqJDNM,#contekan,#mobile-menu,#ttsthumb,.row #boo{display:none}#CSroVkUqJDNM,.ttslvl{background-repeat:no-repeat}#vcWin,.clues a{text-align:left}#answerbox,#vcWin,.ecw-box{overflow:hidden}#vcPrompt,#wordentry,.ecw-box{font-weight:700}#vcOverlay,#vcWin{position:fixed;top:0;left:0}*,::after,::before{box-sizing:border-box}.container{width:100%;padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto}.tts-wrapper{padding:30px;background-color:#513f2e;margin-bottom:30px}@media (max-width:767.98px){.tts-wrapper{padding:30px 15px;margin:0 -15px 30px}}#ecw-control span,#ecw-infoarea span,a.tmbl,input[type=button],input[type=submit],span.tmbl{cursor:pointer;padding:10px 17px;color:#fff;background-color:#cb1e47;border-radius:6px;display:inline-block;line-height:1;border:0;font-family:inherit;font-size:14px;user-select:none}#ecw-crosswordarea,#kotak-tts table,a.activeclue{background-color:#513f2e}#ecw-control span{border-radius:4px;padding:0;width:26px;height:26px;display:flex;align-items:center;justify-content:center;font-size:12px}#ecw-control span>svg{display:block;line-height:1}#buttons,#ecw-control,#ecw-control-right{display:flex}.ecw-answerbox .fa-cog{margin-right:5px}#ecw-crosswordarea{overflow-x:auto}#crossword{margin:0 auto}#crossword td{min-width:30px;height:30px;vertical-align:middle;line-height:1}#ecw-infoarea{margin:150px 0 0}#ecw-control-right span+span,#tbopt span{margin-left:5px}.ecw-answerbox,.ecw-boxnormal_unsel,.pc,.pcbkgnd{background-color:#fff}#congratulations,#welcomemessage{padding:10px 15px;position:absolute;bottom:0;min-width:150px;font-size:14px;border-radius:3px}#answerbox{position:absolute;bottom:0;z-index:5;border-radius:6px;box-shadow:0 0 6px 1px #513f2e;width:370px;max-width:91%}@media only screen and (min-width:1024px){#answerbox{bottom:45px}}#wordlabel{font-size:inherit;margin:0;padding:10px 20px;color:#aaa}#bksinput,#ecw-control,.ecw-worderror,.ecw-wordinfo{margin:0 20px}.ecw-cluebox{margin:0 20px 10px;color:#636060;font-size:14px}input[type=text]{font-family:inherit;font-size:inherit;color:inherit;width:100%;border:0;padding:0;border-bottom:1px solid #dbdbdb;outline:0}input[type=text]:focus{border-color:#513f2e}#wordentry{height:34px}#ecw-control{justify-content:space-between;margin:15px 20px}.ecw-box{border:1px solid #513f2e}.ecw-boxcheated_sel{background-color:#cee6fd;color:#2080d0}.ecw-boxcheated_unsel{background-color:#fff;color:#2080d0}.ecw-boxerror_sel{background-color:#cee6fd;color:#bf0000}.ecw-boxerror_unsel{background-color:#fff0f0;color:#bf0000}.ecw-boxnormal_sel,.focuspc,.focuspcbkgnd{background-color:#fb8119}.ecw-crosswordarea table{border-collapse:collapse}.ecw-wordinfo{color:#636060;font-size:13px;margin-bottom:10px}.ecw-worderror{color:red;display:none}.cluelabel,.clues a,.ttslvl{display:block}#jsoal{color:#666}#kotak-tts{float:left;line-height:normal;padding:0 15px 0 0}#kotak-soal{float:left;margin-bottom:5px}.clues{border:1px solid #d0d9da;height:125px;width:220px;overflow:auto}.clues a{color:#000}#contekan,#mobile-menu a,#vcPrompt,a.activeclue{color:#fff}.clues a:hover{background-color:#9e7a59;text-decoration:none;color:#fff}.cluelabel{float:left;width:25px}#kotak-tts table{border-collapse:separate}.activepcbkgnd,.focuspcbkgnd,.pcbkgnd,.spacer,.wrongpcbkgnd{cursor:pointer;padding:0;position:relative}.activepc,.activepcbkgnd{background-color:#8080ff}.wrongpc,.wrongpcbkgnd{background-color:#c33}#vcPrompt,.spacer{background-color:#513f2e}.spacer{cursor:auto}.label{font-size:11px;color:#513f2e;margin-left:1px;position:absolute}#kotak-tts input{border:0;height:26px;vertical-align:middle;width:26px}#buttons{background:0;margin-top:5px;width:100%;justify-content:space-between}#contekan{background:#d34d02;padding:10px 15px;margin-bottom:20px}#contekan button{margin-right:8px}#mobile-menu *{-webkit-transition:none;-moz-transition:none;-o-transition:none;transition:none}.ttslvl{width:90px;height:90px;background-size:270px;margin-bottom:40px;box-shadow:0 3px 6px rgba(0,0,0,.16),0 3px 6px rgba(0,0,0,.23);border-radius:45px}.ttslvl:hover{filter:opacity(.7)}#tts-mudah{background-position:0 0}#tts-sedang{background-position:-90px 0}#tts-sulit{background-position:-180px 0}#CSroVkUqJDNM{background-size:cover;width:300px;height:260px;margin-top:40px}#vcWin{width:320px;z-index:90;padding:0;background-color:#fff;border-radius:3px}#vcInWin{padding:20px;margin:0}#vcPrompt{font-size:24px;padding:20px;margin:-20px -20px 40px}#vcInWin input[type=button]{margin-left:10px}#vcInWin div{text-align:right;margin-top:20px}#vcOverlay{background-color:#000;opacity:.5;width:100%;height:100%;z-index:89}@media (max-width:767px){#crossword td{min-width:19px;height:19px}}
</style>

@endpush

@section('content')
<div class="container w-kly px-8 my-5 body-container">
    <h1 class="dt-title text-30 font-bold mb-4">TEKA TEKI SILANG</h1>
    <div>
        <div class="tts-wrapper">
            <div class="outer">
                <div class="bod">
                    <div class="ecw-answerbox" id="waitmessage" style="display: none;">
                        Memuat...</div>
                    <div id="ecw-crosswordarea">
                        <script type="text/javascript">
                            CrosswordWidth = 15;
                            CrosswordHeight = 18;
                            Words = 8;
                            // WordLength = new Array(4, 12, 4, 6, 11, 9, 13, 8);
                            Word = new Array("VIVA", "BOLANGBALING", "PMPS", "ANDONG", "SYAHADATAIN", "INDONESIA", "KRJOGJADOTCOM", "GUNUNGAN");
                            // Word = new Array();
                            Clue = new Array("Merek komestik yang ada di stand KR di Pasar Malam Perayaan Sekaten (PMPS)",
                                "Makanan tradisional yang ada di Pasar Malam Perayaan Sekatan (PMPS)",
                                "Pasar Malam Perayaan Sekaten (singkatan)",
                                "Kendaraan tradisional yang ada di Yogyakarta",
                                "Asal kata Sekaten",
                                "Siapa kita?",
                                "Akun instagram krjogja.com",
                                "Yang diperebutkan dalam gerebeg");
                            // AnswerHash = new Array(1734, 35305, 12541, 47429, 79080, 96842, 1270, 41417);
                            WordX = new Array(3, 3, 1, 4, 0, 4, 7, 13);
                            WordY = new Array(0, 3, 6, 8, 14, 0, 5, 1);
                            LastHorizontalWord = 4;
                            OnlyCheckOnce = false;    
                        </script>
                        <table cellpadding="0" cellspacing="0" id="crossword"
                            style="display: table;">
                            <script>
                                var TableAcrossWord,TableDownWord,CurrentWord,PrevWordHorizontal,x,y,i,j,CrosswordFinished,Initialized,BadChars="`~!@^*()_={[}]|:;\"',<.>/?",WordLength=[],AnswerHash=[];for(i=0;i<Word.length;i++){var a=Word[i].length,b=HashWord(Word[i]);WordLength.push(a),AnswerHash.push(b)}if(null!=document.getElementById("waitmessage")){for(x=0,document.getElementById("waitmessage").innerHTML="Memuat...",CurrentWord=-1,PrevWordHorizontal=!1,TableAcrossWord=Array(CrosswordWidth);x<CrosswordWidth;x++)TableAcrossWord[x]=Array(CrosswordHeight);for(x=0,TableDownWord=Array(CrosswordWidth);x<CrosswordWidth;x++)TableDownWord[x]=Array(CrosswordHeight);for(y=0;y<CrosswordHeight;y++)for(x=0;x<CrosswordWidth;x++)TableAcrossWord[x][y]=-1,TableDownWord[x][y]=-1;for(i=0;i<=LastHorizontalWord;i++)for(x=WordX[i],y=WordY[i],j=0;j<WordLength[i];j++)TableAcrossWord[x+j][y]=i;for(i=LastHorizontalWord+1;i<Words;i++)for(x=WordX[i],y=WordY[i],j=0;j<WordLength[i];j++)TableDownWord[x][y+j]=i;for(y=0;y<CrosswordHeight;y++){for(document.writeln("<tr>"),x=0;x<CrosswordWidth;x++)0<=TableAcrossWord[x][y]||0<=TableDownWord[x][y]?document.write('<td id="c'+PadNumber(x)+PadNumber(y)+'" class="ecw-box ecw-boxnormal_unsel" onclick="SelectThisWord(event);">&nbsp;</td>'):document.write("<td></td>");document.writeln("</tr>")}Initialized=!0,document.getElementById("waitmessage").style.display="none",document.getElementById("crossword").style.display="table"}function WordEntryKeyPress(a){CrosswordFinished||0<=CurrentWord&&13==a.keyCode&&OKClick()}function BeginCrossword(){Initialized&&(document.getElementById("welcomemessage").style.display="",document.getElementById("checkbutton").style.display="")}function ContainsBadChars(b){for(var a=0;a<b.length;a++)if(0<=BadChars.indexOf(b.charAt(a)))return!0;return!1}function PadNumber(a){return 10>a?"00"+a:100>a?"0"+a:""+a}function CellAt(a,b){return document.getElementById("c"+PadNumber(a)+PadNumber(b))}function DeselectCurrentWord(){0>CurrentWord||(document.getElementById("answerbox").style.display="none",ChangeCurrentWordSelectedStyle(!1),CurrentWord=-1)}function ChangeWordStyle(a,b){if(!(0>a)){var c=WordX[a],d=WordY[a];if(a<=LastHorizontalWord)for(i=0;i<WordLength[a];i++)CellAt(c+i,d).className=b;else for(i=0;i<WordLength[a];i++)CellAt(c,d+i).className=b}}function ChangeCurrentWordSelectedStyle(a){if(!(0>CurrentWord)){var b=WordX[CurrentWord],c=WordY[CurrentWord];if(CurrentWord<=LastHorizontalWord)for(i=0;i<WordLength[CurrentWord];i++)CellAt(b+i,c).className=CellAt(b+i,c).className.replace(a?"_unsel":"_sel",a?"_sel":"_unsel");else for(i=0;i<WordLength[CurrentWord];i++)CellAt(b,c+i).className=CellAt(b,c+i).className.replace(a?"_unsel":"_sel",a?"_sel":"_unsel")}}function SelectThisWord(a){if(!CrosswordFinished){document.getElementById("welcomemessage").style.display="none",0<=CurrentWord&&OKClick(),DeselectCurrentWord(),a=parseInt((e=a.srcElement?a.srcElement:a.target).id.substring(1,4),10),e=parseInt(e.id.substring(4,7),10),0<=TableAcrossWord[a][e]&&0<=TableDownWord[a][e]?CurrentWord=PrevWordHorizontal?TableDownWord[a][e]:TableAcrossWord[a][e]:0<=TableAcrossWord[a][e]?CurrentWord=TableAcrossWord[a][e]:0<=TableDownWord[a][e]&&(CurrentWord=TableDownWord[a][e]),PrevWordHorizontal=CurrentWord<=LastHorizontalWord,ChangeCurrentWordSelectedStyle(!0),a=WordX[CurrentWord],e=WordY[CurrentWord],d="";var e,b,d,c,f=0;for(b=0;b<WordLength[CurrentWord];b++)null!=(c=CurrentWord<=LastHorizontalWord?CellAt(a+b,e):CellAt(a,e+b)).innerHTML&&0<c.innerHTML.length&&" "!=c.innerHTML&&"&nbsp;"!=c.innerHTML.toLowerCase()?(d+=c.innerHTML.toUpperCase(),f++):d+="&bull;";document.getElementById("wordlabel").innerHTML=d,document.getElementById("wordinfo").innerHTML=(CurrentWord<=LastHorizontalWord?"Mendatar, ":"Menurun, ")+WordLength[CurrentWord]+" huruf.",document.getElementById("wordclue").innerHTML=Clue[CurrentWord],document.getElementById("worderror").style.display="none",document.getElementById("cheatbutton").style.display=(Word.length,""),f==WordLength[CurrentWord]?document.getElementById("wordentry").value=d:document.getElementById("wordentry").value="",document.getElementById("answerbox").style.display="block";try{document.getElementById("wordentry").focus(),document.getElementById("wordentry").select()}catch(g){}}}function OKClick(){var b,c,d,a;if(!CrosswordFinished&&!document.getElementById("okbutton").disabled){if(0==(b=document.getElementById("wordentry").value.toUpperCase()).length)DeselectCurrentWord();else if(ContainsBadChars(b))document.getElementById("worderror").innerHTML="Ada karakter yang tidak dapat diterima.",document.getElementById("worderror").style.display="block";else if(b.length<WordLength[CurrentWord])document.getElementById("worderror").innerHTML="Hurufnya kurang.",document.getElementById("worderror").style.display="block";else if(b.length>WordLength[CurrentWord])document.getElementById("worderror").innerHTML="Hurufnya kelebihan.",document.getElementById("worderror").style.display="block";else{for(a=0,c=WordX[CurrentWord],d=WordY[CurrentWord];a<b.length;a++)CellAt(c+(CurrentWord<=LastHorizontalWord?a:0),d+(CurrentWord>LastHorizontalWord?a:0)).innerHTML=b.substring(a,a+1);DeselectCurrentWord()}}}function CheckClick(){var a,b,e,f,c=0,d=0;if(!CrosswordFinished){for(DeselectCurrentWord(),b=0;b<CrosswordHeight;b++)for(a=0;a<CrosswordWidth;a++)(0<=TableAcrossWord[a][b]||0<=TableDownWord[a][b])&&"ecw-box ecw-boxerror_unsel"==(f=CellAt(a,b)).className&&(f.className="ecw-box ecw-boxnormal_unsel");for(a=0;a<Words;a++){for(b=0,e="";b<WordLength[a];b++)if(0<(f=a<=LastHorizontalWord?CellAt(WordX[a]+b,WordY[a]):CellAt(WordX[a],WordY[a]+b)).innerHTML.length&&"&nbsp;"!=f.innerHTML.toLowerCase())e+=f.innerHTML.toUpperCase();else{e="",d++;break}HashWord(e)!=AnswerHash[a]&&0<e.length&&(c++,ChangeWordStyle(a,"ecw-box ecw-boxerror_unsel"))}OnlyCheckOnce&&(CrosswordFinished=!0,document.getElementById("checkbutton").style.display="none"),0<c&&0<d?document.getElementById("welcomemessage").innerHTML=c+" jawaban salah dan "+d+" soal belum dijawab":0<c?document.getElementById("welcomemessage").innerHTML=c+" jawaban salah":0<d&&(document.getElementById("welcomemessage").innerHTML="Jawaban tidak ada yang salah, tapi "+d+" soal belum dijawab"),0<c+d?document.getElementById("welcomemessage").style.display="":(CrosswordFinished=!0,document.getElementById("congratulations").style.display="block",document.getElementById("welcomemessage").style.display="none")}}function CheatClick(){if(!CrosswordFinished){var a=CurrentWord;document.getElementById("wordentry").value=Word[CurrentWord],OKClick(),ChangeWordStyle(a,"ecw-box ecw-boxcheated_unsel")}}function HashWord(b){var a,d=719*b.charCodeAt(0)%1138,c=837;for(a=1;a<=b.length;a++)c=(c*a+5+(b.charCodeAt(a-1)-64)*d)%98503;return c}function TutupDownload(){document.getElementById("lyrpdr").style.display="none",document.getElementById("ttsdload").style.display="none"}function BukaDownload(){document.getElementById("lyrpdr").style.display="block",document.getElementById("ttsdload").style.display="block"}
                            </script>
                        </table>
                    </div>
                    <div id="ecw-infoarea">
                        <span class="tmbl" id="checkbutton" onclick="CheckClick()">Periksa
                            Jawaban</span>
                        <div class="ecw-answerbox" id="welcomemessage"
                            style="display: none;">
                            Klik di salah satu kotak TTS untuk memulai
                        </div>
                        <div class="ecw-answerbox" id="congratulations"
                            style="display:none">
                            Kamu berhasil menyelesaikan TTS ini!
                        </div>
                    </div>
                    <div class="ecw-answerbox" id="answerbox" style="display: none;">
                        <h3 class="ecw-wordlabel" id="wordlabel"></h3>
                        <div class="ecw-wordinfo" id="wordinfo"></div>
                        <div class="ecw-cluebox" id="wordclue"></div>
                        <div id="bksinput">
                            <input autocomplete="off" class="ecw-input" id="wordentry"
                                onchange="WordEntryKeyPress(event)"
                                onkeypress="WordEntryKeyPress(event)" size="30" type="text">
                        </div>
                        <div class="ecw-worderror" id="worderror" style="display: none;">
                        </div>
                        <div id="ecw-control">
                            <div id="ecw-control-left">
                                <span id="cheatbutton" onclick="CheatClick()"
                                    title="Contekan"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z" />
                                    </svg></span>
                            </div>
                            <div id="ecw-control-right">
                                <span class="ecw-input ecw-button" id="okbutton"
                                    onclick="OKClick()"><svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z" />
                                    </svg></span>
                                <span class="ecw-input ecw-button" id="cancelbutton"
                                    onclick="DeselectCurrentWord()"><svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 352 512">
                                        <path
                                            d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z" />
                                    </svg></span>
                            </div>
                        </div>
                    </div>
                    <script>
                        BeginCrossword();
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection