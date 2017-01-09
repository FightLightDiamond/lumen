/**
 * Created by e on 1/5/17.
 */
import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
import { Observable } from 'rxjs/Observable';
/**
 * Config
 */
import { BASE_URL } from '../config/app.config';

@Injectable()

export class SongService
{
    private searchWithSingerUrl = 'songs/search-with-singer';

    constructor(private _http: Http)
    {

    }

    SearchWithSinger(params: string = ''): Observable<any[]>
    {
        var url = BASE_URL + this.searchWithSingerUrl + params;
        return this._http.get(url)
            .map(
                (res: Response) => res.json()
            )
    }
}