/**
 * Created by e on 1/4/17.
 */
import { Component } from '@angular/core';
import { Subscription } from 'rxjs';
import {Router, ActivatedRoute} from '@angular/router';
/**
 * Services
 */
import { ChartsService } from '../../services/charts.service';
import { SongService } from '../../services/songs.service';
import { VideoService } from '../../services/video.service';
import { AlbumService } from '../../services/album.service';
/**
 * Config
 */
import { CHART_NAMES, PAGINATE } from '../../config/charts'
import { error } from '../../config/errors'

// import { CustomFormsModule } from 'ng2-validation'

@Component({
    selector: 'all-week-chart',
    templateUrl: 'app/templates/charts/all-week-chart.component.html',
    styleUrls : [
        'app/styles/validate.css',
        'app/styles/charts/week-type.component.css'
    ],
    providers: [ChartsService, SongService, VideoService, AlbumService],
})

export class AllWeekChartsComponent{
    public areaNames: any = CHART_NAMES.AREAS;
    public typeNames: any = CHART_NAMES.TYPES;
    public weeks : any[];
    public charts: any[][];
   // public subscription: Subscription;
    public _week: number;
    public typeNo: number;
    public items: any[];
    public itemRemember:number;
    public active: boolean = false;
    public disabled: any;
    public areaNo: number;
    public rankNo: number;
    public chartsId: number;
    //Paginate
    private hiddenItemLinks: boolean = true;
    private showPreviousItemLinks: boolean = false;
    private showNextItemLinks: boolean = false;
    private currentPageItemLinks: number = 1;
    private pointDefault: number = 1000;
    private numberItem = PAGINATE.NUMBER_ITEM;

    constructor(
        private chartsService: ChartsService,
        private songService: SongService,
        private videoService: VideoService,
        private albumService: AlbumService,
        private router: Router,
        private activatedRouter: ActivatedRoute
    ){}

    ngOnInit(){
        this.activatedRouter.queryParams.subscribe(
            params => {
                this.currentPageItemLinks = params['page'] || 1;
            }
        );

        this.chartsService.GetAllWeek()
            .subscribe(
                (res: any) => {
                    this.weeks = res;
                },
                error => {
                    console.log(error);
                    console.log("API get all week error!")
                }
            );
        this.getActually();
    }
    private getActually(){
        this.chartsService.GetActually()
            .subscribe(
                (res: any) => {
                    this.buildCharts(res);
                    console.log(this.charts);
                },
                error => {
                    console.log(error);
                    console.log("API get actually error");
                }
            );
    }
    private buildCharts(res: any[][]){
        this.charts = [[], [], []];
        var index = 0;
        var numberItem = this.numberItem;
        for(var i = 1; i <= 9; i++)
        {
            this.charts[index].push(
                res.slice(i * numberItem - numberItem, i * numberItem)
            );
            if(i%3 == 0)
            {
                ++index;
            }
        }
    }

    ngOnCreate(){
        var ok = confirm('You want to create new week ?');
        if(ok){
            this.chartsService.CreateNewWeek().subscribe(
                (res: any) => {
                    if(res === true){
                        var maxWeek = this.weeks[0];
                        this.weeks.unshift(++maxWeek);
                        this.getActually();
                    }
                }
            );

        }
    }
    /*
        Process
     */
    private resetItems(){
        this.items = [];
    }

    getItemChart(chartsId: number, rankNo: number){
        this.chartsId = chartsId;
        this.rankNo = rankNo;
    }
    selectedItemChart(typeNo: number, areaNo: number, rankNo: number, chartsId: number){
        if(this.typeNo != typeNo)
        {
            this.resetItems();
            this.typeNo = typeNo;
        }
        this.areaNo = areaNo;
        this.rankNo = rankNo;
        this.chartsId = chartsId;
    }
    updateChart(formData: any){
        this.chartsService.update(this.chartsId, formData)
            .subscribe(
                data => {
                    if(data){
                        this.charts[this.typeNo][this.areaNo][this.rankNo].item = this.itemRemember;
                        this.charts[this.typeNo][this.areaNo][this.rankNo].item_id = this.itemRemember;
                    }else{
                        this.error();
                    }
                }
            )
    }
    searchItem(formData: any, numPage: number = 1){
        var params: string = '?name=' + formData.itemName + '& singer_name=' + formData.singerName + '&page='+numPage;
        if(this.typeNo == 0){
            this.songService.SearchWithSinger(params)
                .subscribe(
                    data => {
                        this.items = data['data'];
                        this.setItemLinks(data);
                    }
                );
        }
        else if(this.typeNo == 1){
            this.videoService.SearchWithSinger(params)
                .subscribe(
                    data => {
                        this.items = data['data'];
                        this.setItemLinks(data);
                    }
                );
        }
        else if(this.typeNo == 2){
            this.albumService.SearchWithSinger(params)
                .subscribe(
                    data => {
                        this.items = data['data'];
                        this.setItemLinks(data);
                    }
                );
        }
        else {
            this.error();
        }
    }
    private setItemLinks(data: any)
    {
        if(data.to === this.numberItem) {
            this.showNextItemLinks = true;
        } else {
            this.showNextItemLinks = false;
        }

        if(data.to < this.numberItem && data.current_page === 1) {
            this.hiddenItemLinks = true;
        } else {
            this.hiddenItemLinks = false;
        }
        // alert(data.to);
        // alert(this.showNextItemLinks)

        if(data.current_page === 1){
            this.showPreviousItemLinks = false;
        } else {
            this.showPreviousItemLinks = true;
        }
        this.currentPageItemLinks = data.current_page;
    }

    rememberSelectedItem(itemRemember: number){
        this.itemRemember = itemRemember;
    }
    setActive(active: boolean){
        var sure: boolean = confirm('Are you sure?');
        if(sure)
        {
            var data: any = { week: this.weeks[0], is_active: active };
            this.chartsService.SetActive(data)
                .subscribe(
                    data => {
                        if(data){
                            this.active = active;
                        } else {
                            this.error();
                        }
                    }
                );
        }
    }

    private error(){
        error()
    }
}