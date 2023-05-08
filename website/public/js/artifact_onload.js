function init_stats(pc, pf, pi, pd){

    for(let i = 1;i <= 4; i++){
        switch(i){
            case 1:
                n = pc;
                item ="car";
                break;
            case 2:
                n = pf;
                item ="fue";
                break;
            case 3:
                n = pi;
                item ="int";
                break;
            case 4:
                n = pd;
                item ="for";
                break;
        }
        if (n > 0){
            document.getElementById(item+"Input0").removeAttribute("checked");

            for(let e = 1; e <= n; e++){
                document.getElementById(item+e).classList.add("checked");
            }
            document.getElementById(item+"Input"+n).setAttribute("checked", true);
        }
    }
}