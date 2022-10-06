export default class Movies{
    constructor() {
        this.data = {
            password: "Scooby",

        }

        this.rootElem = document.querySelector('.movies');
        this.filter = this.rootElem.querySelector('.filter');
        this.items = this.rootElem.querySelector('.items');

        this.nameSearch = this.filter.querySelector('.nameSearch');
        this.ratingSearch = this.filter.querySelector('.ratingSearch');
        this.aarSearch = this.filter.querySelector('.aarSearch');
        this.genreSearch = this.filter.querySelector('.genreSearch');

    }

    async init(){

        this.nameSearch.addEventListener('input', () =>{
            if (this.nameSearch.value.length >= 3){
                this.render();
            }
            this.render();
        });
        this.ratingSearch.addEventListener('input', () =>{
            this.render();
        });
        this.aarSearch.addEventListener('input', () =>{
           this.render();
        });

        this.genreSearch.addEventListener('input', () =>{
            this.render();
        });

        await this.render();
    }

    async render(){
        const data = await this.getData();
        console.log(data);

        const row = document.createElement('div');
        row.classList.add('row', `g-4`);

        for (const item of data){
            const col = document.createElement('div');
            col.classList.add('col-md-6', `col-lg-4`, `col-xl-3`);

            col.innerHTML = `
                <div class="shadow bio image card border-0 h-100 d-flex flex-column justify-content-between">
                    <img src="uploads/${item.movieBillede}">
                    <div class="card-body">
                        <h3 class="card-title text-white pt-2">${item.movieTitel}</h3>
                        <p class="card-text p-2">${item.movieDiscription}</p>
                    </div>
                    <div class="m-3">
                        <a href="moviePage.php?movieId=${item.movieId}" class="justify-content-center w-100 p-3 knap d-flex stretched-link">Læs om filmen </a>
                    </div>
                </div>
            `;

            row.appendChild(col);
        }
        this.items.innerHTML = '';
        this.items.appendChild(row);
    }

    async getData(){
        this.data.nameSearch = this.nameSearch.value;
        this.data.ratingSearch = this.ratingSearch.value;
        this.data.aarSearch = this.aarSearch.value;
        this.data.genreSearch = this.genreSearch.value;

        const response = await fetch('api.php', {
            method: "POST",
            body: JSON.stringify(this.data)
        });
        return await response.json();

    }

}