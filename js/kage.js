export default class Kage{
    constructor() {
    }

    async kageEllerHvad(){

        try{
            const responseKage = await this.skalKimGiveKage(true);
            console.log(responseKage);

            const responseSize = await this.erDetEnStorKage('small');
            console.log(responseSize);
        }catch (error){
            console.log('fejl:' + error);
        }


    }

    skalKimGiveKage(erKimKommetForSent){
        return new Promise((resolve, reject) =>{

            setTimeout(() =>{
                if(erKimKommetForSent){
                    resolve('Kim giver kage');
                }else {
                    reject('Ingen kage i dag!');
                }
            }, 2000);

        });
    }

    erDetEnStorKage(size){
        return new Promise((resolve, reject) =>{
            setTimeout(() =>{
                if (size === "small"){
                    reject('Nej, det er en lille bitte en');
                }else if(size === 'medium'){
                    reject('Nej, heller ikke da');
                }else{
                    resolve('Ja for den da');
                }
            }, 2000)
        });
    }
}