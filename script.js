
let currentPage = 0;

function slide(pages,pagesLength){
    
    
    if(currentPage >= pagesLength){
        currentPage = 0;
    }
    pages.forEach(element => {
        element.classList.remove('notHidden');
        element.classList.add('isHidden');
        if(element === pages[currentPage]){
            element.classList.remove('isHidden');
            element.classList.add('notHidden');    
        }
    });

        currentPage++;
}

function auto(){

    let page1= document.getElementById('page1');
    let page2= document.getElementById('page2');
    let page3= document.getElementById('page3');
    let page4= document.getElementById('page4');

    let pages = new Array(page1,page2,page3,page4);

    let pagesLength = pages.length;
    createDate();

    setInterval(function(){slide(pages,pagesLength)}, 15000);
    
}

function createDate(){

 let weekday = new Array(7);
    weekday[0] = "Sunday";
    weekday[1] = "Monday";
    weekday[2] = "Tuesday";
    weekday[3] = "Wednesday";
    weekday[4] = "Thursday";
    weekday[5] = "Friday";
    weekday[6] = "Saturday";
    
    let today = new Date();
    let dd = String(today.getDate()).padStart(2, '0');
    let mm = today.toLocaleString('default', { month: 'long' });
    
    let day = weekday[today.getDay()];
    let yyyy = today.getFullYear();

    today = day +' '+ mm + ', ' + dd + ', ' + yyyy;
    document.getElementById('date').innerText = today;
}

window.onload = auto;





