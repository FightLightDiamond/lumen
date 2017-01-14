/**
 * Created by cuong on 1/3/17.
 */
import {Component} from '@angular/core';
import {Router} from  '@angular/router';
import {LoginService} from "../../services/auth/login.service";

@Component({
    selector: 'login-component',
    templateUrl: 'app/templates/auth/login.component.html'
})

export class LoginComponent {
    constructor(
        private router: Router,
        private loginService: LoginService
    ) {

    }
    CheckLogin(value: any){
        console.log(value);

        if(value.email == 'i.am.m.cuong@gmail.com' && value.password == 1)
        {
            this.loginService.SetLogin(true);
        } else {
            this.loginService.SetLogin(false);
        }
        //this.router.navigate(['/']);
    }
}