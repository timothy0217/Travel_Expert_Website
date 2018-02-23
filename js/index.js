/*
        Author: Timothy Tsai
        Date Created: October, 2017
        Class: OOSD Oct 2017
        Slide shows for index
*/
//Global Variable - text
    var textSlideShow = new Array()    
    textSlideShow[0]= "<div class='fadeOut'><a href='#'><h1>Welcome to Edmonton</h1><br><h4>Edmonton is the capital city of the Canadian province of Alberta. Edmonton is on the North Saskatchewan River and is the centre of the Edmonton Capital Region, which is surrounded by Alberta's central region. The city anchors the north end of what Statistics Canada defines as the Calgary–Edmonton Corridor </h4></a></div>";

    textSlideShow[1]= "<div class='fadeOut'><a href='#'><h1>Welcome to Calgary</h1><br><h4>Calgary is a city in the Canadian province of Alberta. It is situated at the confluence of the Bow River and the Elbow River in the south of the province, in an area of foothills and prairie, about 80 km (50 mi) east of the front ranges of the Canadian Rockies. The city anchors the south end of what Statistics Canada defines as the Calgary–Edmonton Corridor</h4></a></div>";

    textSlideShow[2]= "<div class='fadeOut'><a href='#'><h1>Welcome to Banff</h1><br><h4>Banff is a town within Banff National Park in Alberta, Canada. It is located in Alberta's Rockies along the Trans-Canada Highway, approximately 126 km west of Calgary and 58 km east of Lake Louise. At an elevation of 1,400 m to 1,630 m Banff is the community with the second highest elevation in Alberta after Lake Louise.</h4></a></div>";

    textSlideShow[3]= "<div class='fadeOut'><a href='#'><h1>Welcome to Lethbridge</h1><br><h4>Lethbridge is a city in the province of Alberta, Canada, and the largest city in southern Alberta. It is Alberta's fourth-largest city by population after Calgary, Edmonton and Red Deer, and the third-largest by land area after Calgary and Edmonton. The nearby Canadian Rockies contribute to the city's warm summers, mild winters, and windy climate. Lethbridge lies southeast of Calgary on the Oldman River.</h4></a></div>";

    textSlideShow[4]= "<div class='fadeOut'><a href='#'><h1>Welcome to Canada</h1><br><h4>Canada is a country in the northern part of North America. Its ten provinces and three territories extend from the Atlantic to the Pacific and northward into the Arctic Ocean, covering 9.98 million square kilometres, making it the world's second-largest country by total area and the fourth-largest country by land area. Canada's southern border with the United States is the world's longest bi-national land border.</h4></a></div>";

//Global Variable - picture

var picSlideShow = new Array()
    picSlideShow[0]= "<img src='img/pic1.jpg' class='fadeOut'>";
    picSlideShow[1]= "<img src='img/pic2.jpg' class='fadeOut'>";
    picSlideShow[2]= "<img src='img/pic3.jpg' class='fadeOut'>";
    picSlideShow[3]= "<img src='img/pic4.jpg' class='fadeOut'>";
    picSlideShow[4]= "<img src='img/pic5.jpg' class='fadeOut'>";
    picSlideShow[5]= "<img src='img/pic6.jpg' class='fadeOut'>";
    picSlideShow[6]= "<img src='img/pic7.jpg' class='fadeOut'>";
    picSlideShow[7]= "<img src='img/pic8.jpg' class='fadeOut'>";
    picSlideShow[8]= "<img src='img/pic9.jpg' class='fadeOut'>";

//Slide Show
function myDisplay()
{
myText = Math.floor((Math.random()*textSlideShow.length));
document.getElementById('textSlideShow').innerHTML=textSlideShow[myText];
setTimeout("myDisplay()",15000);
}

function myPicDisplay()
{
myPic = Math.floor((Math.random()*picSlideShow.length));
document.getElementById('picSlideShow').innerHTML=picSlideShow[myPic];
setTimeout("myPicDisplay()",15000);
}


//log In

var modal = document.getElementById('id01');


window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
