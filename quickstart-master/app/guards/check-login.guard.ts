/**
 * Created by e on 1/9/17.
 */
import {CanActivate} from '@angular/router';
import {Injectable} from "@angular/core";
import {LoginService} from "../services/auth/login.service";

@Injectable()

export class CheckLoginGuard implements CanActivate
{
    constructor(private loginService: LoginService) {

    }
    canActivate()
    {
        let status = this.loginService.IsLogged();
        if(status !== true) alert('You don\'t have permission access to this page');
        return status;
    }
}