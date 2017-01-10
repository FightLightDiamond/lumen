/**
 * Created by e on 1/10/17.
 */
import {Component} from "@angular/core";
import {FormGroup, FormControl, FormBuilder, Validators} from "@angular/forms";

function hasBlackWord(blackWord: string, errorType: string) {
    return function (input: FormControl) {
        //var x = 'email';
        var ok = (input.value).search(blackWord);
        console.log(ok);
        if(ok === -1) {
            return null;
        }
        return {[errorType]: true}


    }
}

@Component({
    selector: 'register-form',
    templateUrl: 'app/templates/auth/register.component.html',
})

export class RegisterComponent {
    registerForm: FormGroup;
    email: FormControl;
    password: FormControl;

    constructor(builder: FormBuilder) {
        this.email = new FormControl('you@mail.com',
            [
                Validators.required,
                Validators.maxLength(17),
                hasBlackWord('email', 'hasBlackWord')
            ]
        );
        this.password = new FormControl('1',
            [
                Validators.required,
            ]
        );
        this.registerForm = builder.group({
            email: this.email,
            password: this.password
        })
    }

    register()
    {
        console.log(this.registerForm.value)
    }

}