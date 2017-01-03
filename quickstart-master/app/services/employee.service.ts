/**
 * Created by cuong on 1/2/17.
 */
import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
import { Observable } from "rxjs/Observable";
import 'rxjs/add/operator/map';

@Injectable()

export class EmployeeService {

    private apiUrl = 'http://5869c847657edf1200b9a62d.mockapi.io/api/v1/employees';

    constructor(private _http: Http){

    }

    GetList(): Observable<any[]> {
        return this._http.get(this.apiUrl)
            .map((response: Response) => response.json());
    }
    GetSingle(id: number): Observable<any[]> {
        return this._http.get(this.apiUrl+'/'+id)
            .map((response: Response) => response.json());
    }
}