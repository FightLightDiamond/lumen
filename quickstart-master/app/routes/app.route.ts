/**
 * Created by cuong on 1/2/17.
 */
import {Routes, RouterModule} from '@angular/router';
/**
 * Component
 */
import {HomeComponent} from '../components/home.component';
import {NotFoundComponent} from '../components/notfound.component';
import {AllWeekChartsComponent} from  '../components/charts/all-week.component';
import {WeekTypeChartsComponent} from  '../components/charts/week-type.component';
import {LoginComponent} from '../components/auth/login.component';
import {CheckLoginGuard} from "../guards/check-login.guard";
import {CheckSaveFormGuard} from "../guards/check-save-form.guard";
import {RegisterComponent} from "../components/auth/register.component";
import {VideoComponent} from "../components/entertainments/videos.component";
import {SongComponent} from "../components/entertainments/songs.component";

const routing: Routes = [
    {
        path: '', component: HomeComponent
    },
    {
        path: 'charts', component: AllWeekChartsComponent,
        canActivate: [CheckLoginGuard], canDeactivate: [CheckSaveFormGuard]
    },
    {
        path: 'charts/:week/:type', component: WeekTypeChartsComponent
    },
    {
        path: 'login', component: LoginComponent
    },
    {
        path: 'register', component: RegisterComponent
    },
    {
        path: 'songs', component: SongComponent
    },
    {
        path: 'videos', component: VideoComponent
    },
    {
        path: '**', component: NotFoundComponent
    }
];

export const appRoutes = RouterModule.forRoot(routing);