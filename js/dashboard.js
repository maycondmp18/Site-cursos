function active(selector){
    if(selector == 'body'){
        //Ao carregar a página
        document.querySelector('#item1').classList.add("active");
        $('.page1').show();
        $('.page2').hide();
        $('.page3').hide();

        document.querySelector('#item2').classList.remove("active");
        document.querySelector('#item3').classList.remove("active");
        document.querySelector('#item4').classList.remove("active");
    }else if(selector == 'selector1'){
        //comment
        document.querySelector('#item1').classList.add("active");
        $('.page1').show();
        $('.page2').hide();
        $('.page3').hide();

        document.querySelector('#item2').classList.remove("active");
        document.querySelector('#item3').classList.remove("active");
        document.querySelector('#item4').classList.remove("active");

    }else if(selector == 'selector2'){
        document.querySelector('#item1').classList.remove("active");
        
        //Mostra somente a Lista de cursos disponiveis
        document.querySelector('#item2').classList.add("active");
        $('.page1').hide();
        $('.page2').show();
        $('.page3').hide();

        document.querySelector('#item3').classList.remove("active");
        document.querySelector('#item4').classList.remove("active");

    }
    else if(selector == 'selector3'){
        document.querySelector('#item1').classList.remove("active");
        document.querySelector('#item2').classList.remove("active");

        //comment
        document.querySelector('#item3').classList.add("active");
        $('.page1').hide();
        $('.page2').hide();
        $('.page3').show();

        document.querySelector('#item4').classList.remove("active");
    }
    else if(selector == 'selector4'){
        document.querySelector('#item1').classList.remove("active");
        document.querySelector('#item2').classList.remove("active");
        document.querySelector('#item3').classList.remove("active");

        //comment
        document.querySelector('#item4').classList.add("active");
        $('.page1').hide();
        $('.page2').show();
        $('.page3').hide();

    }
    //document.querySelector('#item').classList.add("active");
}