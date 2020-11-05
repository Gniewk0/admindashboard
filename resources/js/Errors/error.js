export default class Errors{ // klasa obsługująca błedy walidacji w formularzach
    constructor(){
        this.errors = [];
    }
        has(field) {
            return this.errors.hasOwnProperty(field);
        }

        get(field) {
             if(this.errors[0]){
              return this.errors[0].lenght;
            }
        }

        getName(field) {
            if(this.errors[0]){
                if(this.errors[0].errors["name"] !== undefined)
                return this.errors[0].errors["name"].join(" ");
            }
        }

        getSurname(field) {
            if(this.errors[0]){
                if(this.errors[0].errors["surname"] !== undefined)
                return this.errors[0].errors["surname"].join(" ");
            }
        }

        getSex() {
            if(this.errors[0]){
                if(this.errors[0].errors["sex"] !== undefined)
                return this.errors[0].errors["sex"].join(" ");
            }
        }

        getAddress() {
            if(this.errors[0]){
                if(this.errors[0].errors["address"] !== undefined)
                return this.errors[0].errors["address"].join(" ");
            }
        }

        getAge() {
            if(this.errors[0]){
                if(this.errors[0].errors["age"] !== undefined)
                return this.errors[0].errors["age"].join(" ");
            }
        }

        record(errors){
            this.clearAll()
            this.errors.push(errors);
        }

        clear(field){
            delete this.errors[field];
        }

        clearAll(){
            this.errors = [];
        }
    }
