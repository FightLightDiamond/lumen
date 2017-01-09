/**
 * Created by e on 1/6/17.
 */
import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
import { Observable } from 'rxjs/Observable';
/**
 * Config
 */
import { BASE_URL } from '../config/app.config';
@Injectable()

export class AlbumService
{
    private searchWithSingerUrl = 'albums/search-with-singer';

    constructor(
        private _http: Http
    ){}

    SearchWithSinger(params: any = ''): Observable<any[]>
    {
        return this._http.get(BASE_URL + this.searchWithSingerUrl + params)
            .map(
                (res: Response) => res.json()
            )
    }
}