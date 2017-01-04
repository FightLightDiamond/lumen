/**
 * Created by cuong on 1/3/17.
 */
import { Component } from '@angular/core';
import { Router } from  '@angular/router';
@Component({
    selector: 'login-component',
    templateUrl: 'app/templates/login.component.html'
})

export class loginComponent {
    constructor(private router: Router){

    }
    CheckLogin(value: any){
        this.router.navigate(['/']);
    }
}