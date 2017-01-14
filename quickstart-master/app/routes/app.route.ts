/**
 * Created by cuong on 1/2/17.
 */
import {Routes, RouterModule} from '@angular/router';
/**
 * Component
 */
import {HomeComponent} from '../components/home.component';
import {EmployeeListComponent} from '../components/employee.component';
import {EmployeeDetailComponent} from '../components/employee-detail.component';
import {NotFoundComponent} from '../components/notfound.component';
import {EmployeeOverviewComponent} from '../components/employee-overview.component';
import {EmployeeProjectComponent} from '../components/employee-project.component';
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
        path: 'e', redirectTo: 'employees', pathMatch: 'full'
    },
    {
        path: 'employees', component: EmployeeListComponent
    },
    {
        path: 'employee-detail/:id',
        component: EmployeeDetailComponent,
        children: [
            {
                path: '', redirectTo: 'overview', pathMatch: 'full'
            },
            {
                path: 'overview', component: EmployeeOverviewComponent,
            },
            {
                path: 'projects', component: EmployeeProjectComponent,
            }
        ]
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