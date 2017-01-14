/**
 * Created by e on 1/9/17.
 */
import {Injectable} from "@angular/core";

@Injectable()

export class LoginService
{
    public _isLoggedIn: boolean = false;
    IsLogged(): boolean
    {
        return this._isLoggedIn;
    }
    SetLogin(isLoggedIn: boolean)
    {
        this._isLoggedIn = isLoggedIn;
    }
}