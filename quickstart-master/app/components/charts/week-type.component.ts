/**
 * Created by e on 1/5/17.
 */
import { Component } from '@angular/core';
import { Subscription } from 'rxjs';
import { Router, ActivatedRoute } from '@angular/router';
import { ChartsService } from '../../services/charts.service';
import { SongService } from '../../services/songs.service';
import { VideoService } from '../../services/video.service';
import { AlbumService } from '../../services/album.service';

@Component({
    selector: 'week-type-charts',
    templateUrl: 'app/templates/charts/week-type.component.html',
    styleUrls: [
        'app/styles/charts/week-type.component.css'
    ]
})


export class WeekTypeChartsComponent {
    public subscription: Subscription;
    public _week: number;
    public _type: number;
    public typeName: string;
    public typeNames: any = { 1:'song', 2: 'video', 3: 'album'};
    public areaNames: any = { 1:'VN', 2: 'ASIA', 3: 'U.S.UK'};
    public items: any[];
    public charts: any[];
    public itemKey:number;
    public active: boolean = false;
    public disabled: any;
    public areaNo: number;
    public areaKey: number;
    public chartsId: number;

    constructor(
        private route: Router,
        private activatedRoute: ActivatedRoute,
        private chartsService: ChartsService,
        private songService: SongService,
        private videoService: VideoService,
        private albumService: AlbumService
    ){}

    ngOnInit()
    {
        this.subscription = this.activatedRoute
            .params
            .subscribe(
                params => {
                    this._week = params['week'];
                    this._type = params['type'];
                    this.typeName = this.typeNames[params['type']];
                    this.getByWeekAndType();
                    this.disableLink();
                    this.resetItems();
                }
            );
    }

    private resetItems(){
        const TYPE_NAMES: any = { 1:'song', 2: 'video', 3: 'album'};
        const AREA_NAMES: any = { 1:'VN', 2: 'ASIA', 3: 'U.S.UK'};
        this.items = [];
    }
    private getByWeekAndType(){
        this.chartsService.GetWeekAndType(this._week, this._type)
            .subscribe(
                data => {
                    this.charts = [];
                    this.charts.push(data.slice(0,10));
                    this.charts.push(data.slice(10,20));
                    this.charts.push(data.slice(20,30));
                    console.log(this.charts);
                }
            );
    }
    private disableLink(){
        this.disabled = {
            1: false,
            2: false,
            3: false
        } ;
        this.disabled[this._type] = 'disabled';
    }
    getItemChart(chartsId: number, areaKey: number){
        this.chartsId = chartsId;
        this.areaKey = areaKey;
    }
    selectedItemChart(areaNo: number, areaKey: number, chartsId: number){
        this.areaNo = areaNo;
        this.areaKey = areaKey;
        this.chartsId = chartsId;
    }
    updateChart(formData: any){
        this.chartsService.update(this.chartsId, formData)
            .subscribe(
                data => {
                    if(data)
                    {
                        this.charts[this.areaNo][this.areaKey].item = this.items[this.itemKey];
                        this.charts[this.areaNo][this.areaKey].item_id = this.items[this.itemKey].id;
                        console.log(data)
                    }
                }
            )
    }
    searchItem(e: any){
        if(e.which == 13){
            if(this._type == 1){
                this.songService.SearchWithSinger()
                    .subscribe(
                        data => {
                            this.items = data['data'];
                        }
                    );
            }
            else if(this._type == 2){
                this.videoService.SearchWithSinger()
                    .subscribe(
                        data => {
                            this.items = data['data'];
                        }
                    );
            }
            else if(this._type == 3){
                this.albumService.SearchWithSinger()
                    .subscribe(
                        data => {
                            this.items = data['data'];
                        }
                    );
            }
            else {
                alert('Hệ thống đang bị Hacker tấn công vui lòng thông báo kỹ thuật viên');
            }
        }
    }
    rememberSelectedItem(itemKey: number){
        this.itemKey = itemKey;
    }
}