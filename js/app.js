



const app={



    data(){

        return{

            currentPage:"home",
            links:[
                {id:0,img:'phone.png',name:"Мобильные"},
                {id:1,img:'power-bank.png',name:"Powerbank"},
                {id:2,img:'phone case.png',name:"Phone case"},
                {id:3,img:'gpu-icon.png',name:"Видеокарты"},
                {id:4,img:'cpu.png',name:"Процессоры"},
                {id:5,img:'bike.png',name:"Велосипеды"},
            ],
            popular:[
                {id:1,img:'Airpods.png',name:"Apple AirPods 2 with Charging Case"},
                {id:2,img:'bicycle.png',name:"Велосипед AltairAL 27.5 V FR"},
                {id:3,img:'GPU.png',name:"MSI GeForce GTX 1660 SUPER Gaming"},
                {id:4,img:'GPU.png',name:"MSI GeForce GTX 1660 SUPER Gaming"}
            ],
            images:[
                "\thttps://live.staticflickr.com/65535/52913385847_be5c9a2ff2_n.jpg",
                "https://live.staticflickr.com/65535/52914082567_d50b5cfa99_z.jpg",
                "\thttps://live.staticflickr.com/65535/52913385972_599b3c0dfe_b.jpg",

            ],
            info:[
                {title:"MSI GeForce GTX 1660 SUPER Gaming 6gb"},
                {title:"iPhone 14 Теперь Розовый Встроенная память 8/126 ГБЗаряд батареи 3095 мА·ч Основная камера (Мп)12 + 12"},
                {title:"MSI GeForce GTX 1660 SUPER Gaming 6gb"},
            ],
            powerbanks:[
                {id:1,img:'powerbank.png',name:"MSI GeForce GTX 1660 SUPER Gaming", price:20000 ,views:31,category:"powerbank"},
                {id:2,img:'powerbank.png',name:"MSI GeForce GTX ", price:30000 ,views:11,category:"powerbank"},

            ],
            // phones:[
            //     {id:1,img:'iphone13.png',name:"iphone13",price:50000 ,views:21 ,category:"phone"},
            //     {id:2,img:'Pocox5pro.png',name:"Велосипед AltairAL 27.5 V FR", price:6000,views:211,category:"phone"},
            // ],
            phonecase:[
                {id:1,img:'phonecase.png',name:"Велосипед AltairAL 27.5 V FR", views:111,price:1000,category:"phonecase"},
                {id:2,img:'phonecase2.png',name:"Велосипед AltairAL 27.5 V FR",views:11,price:5000,category:"phonecase"}
            ],
            gpu:[
                {id:1,img:'GPU.png',name:"Велосипед AltairAL 27.5 V FR", views:111,price:1000,category:"gpu"},
                {id:2,img:'gpuamd.png',name:"Велосипед AltairAL 27.5 V FR",views:11,price:5000,category:"gpu"}
            ],
            cpu:[
                {id:1,img:'cpu.png',name:"Велосипед AltairAL 27.5 V FR", views:111,price:1000,category:"cpu"},
                {id:2,img:'cpui7.png',name:"Велосипед AltairAL 27.5 V FR",views:11,price:5000,category:"cpu"}
            ],
            bikes:[
                {id:1,img:'bicycle.png',name:"Велосипед AltairAL 27.5 V FR", views:111,price:1000,category:   "bikes"},
                {id:2,img:'bicycle2.png',name:"Велосипед AltairAL 27.5 V FR",views:11,price:5000,category:"bikes"}
            ],
            products: [
                { id: 1, name: 'Велосипед AltairAL 27.5 V FR', price: 10.99, description: 'Описание продукта 1' },
                { id: 2, name: 'Продукт 2', price: 19.99, description: 'Описание продукта 2' },
                { id: 3, name: 'Продукт 3', price: 5.99, description: 'Описание продукта 3' },

            ],
            productss: [
                {id:1,img:'powerbank.png',name:"MSI GeForce GTX 1660 SUPER Gaming", price:20000 ,views:31,category:"powerbank"},
                {id:2,img:'powerbank.png',name:"MSI GeForce GTX ", price:30000 ,views:1,category:"powerbank"},
                // {id:3,img:'iphone13.png',name:"iphone13",price:50000 ,views:21 ,category:"phone"},
                // {id:4,img:'Pocox5pro.png',name:"Велосипед AltairAL 27.5 V FR", price:6000,views:211,category:"phone"},
                {id:5,img:'phonecase.png',name:"Велосипед AltairAL 27.5 V FR", views:111,price:1000,category:"phonecase"},
                {id:6,img:'phonecase2.png',name:"Велосипед AltairAL 27.5 V FR",views:11,price:5000,category:"phonecase"},
                {id:7,img:'GPU.png',name:"Велосипед AltairAL 27.5 V FR", views:111,price:1000,category:"gpu"},
                {id:8,img:'gpuamd.png',name:"Велосипед AltairAL 27.5 V FR",views:11,price:5000,category:"gpu"},
                {id:9,img:'cpu.png',name:"Велосипед AltairAL 27.5 V FR", views:111,price:1000,category:"cpu"},
                {id:10,img:'cpui7.png',name:"Велосипед AltairAL 27.5 V FR",views:11,price:5000,category:"cpu"},
                {id:11,img:'bicycle.png',name:"Велосипед AltairAL 27.5 V FR", views:111,price:1000,category:   "bikes"},
                {id:12,img:'bicycle2.png',name:"Велосипед AltairAL 27.5 V FR",views:11,price:5000,category:"bikes"},

            ],

            query: '',
            compareProducts: [],
            description:" Горный велосипед Trinx M116 Pro (2021)<br> Рама:Alum 6061 Special-shaped Цепь:KMC 7S",
            currentImageIndex: 0,
            isVisible:false,
            isVisiblee:false,
            isVisibleee:false,
            inputVisible: false,
            handlers: [
                () => this.currentPage="phone",
                () => this.currentPage="powerbanks",
                () =>this.currentPage="phonecase",
                () =>this.currentPage="gpu",
                () =>this.currentPage="cpu",
                () =>this.currentPage="bikes",

            ],
            showMenu: false,
            compare:false,
            isChecked:false,
            filter: {
                sort: 'popular'
            },
            selectedProduct: null,

        };


    },


     computed: {
        currentImage() {
            return this.images[this.currentImageIndex];
        },





         productsss(){
             let productsss=this.productss
             const sort=this.filter.sort
             if (sort === 'price') {
                 productsss.sort((a, b) => a.price - b.price)
             }
             if (sort === 'popular') {
                 productsss.sort((a, b) => a.views - b.views)
             }
             return productsss
         },





         filteredProducts(id) {

             return this.productss.filter((product) =>
                 product.name.toLowerCase().includes(this.query.toLowerCase())
             );
         },

    },
    methods: {
        // xyi(link){
        //     this.currentPage=link.name
        // },
        showElement(a) {

            this.isVisible = true;
        },
        hideElement(a) {
            this.isVisible = false;
        },
        showElements(b) {

            this.isVisiblee = true;
        },
        hideElements(b) {
            this.isVisiblee = false;
        },
        showElementss(c) {

            this.isVisibleee = true;
        },
        hideElementss(c) {
            this.isVisibleee = false;
        },
        previousImage() {
            this.currentImageIndex =
                (this.currentImageIndex + this.images.length - 1) % this.images.length;
        },
        nextImage() {
            this.currentImageIndex = (this.currentImageIndex + 1) % this.images.length;
        },
        goToSlide(index) {
            this.currentImageIndex = index;
        },
        showList() {
            this.inputVisible = true;
        },
        hideList() {
            this.inputVisible = false;

       },
        addToCompare(item) {
            console.log(this.compareProducts);
            const findProduct = this.compareProducts.find(
                (i) => i.id === item.id
            );
            if(!findProduct){
                this.compareProducts.push({... item,})
            }

        },
        deleteFromCompare(item) {
            console.log(item);
            this.compareProducts= this.compareProducts.filter((i) => i.id !== item)

        },
        showProduct(id) {
            this.selectedProduct = this.productss[id];

        },


    },

}




Vue.createApp(app).mount('#app')
