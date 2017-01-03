/**
 * Created by cuong on 1/2/17.
 */
import { Routes, RouterModule } from '@angular/router';
/**
 * Component
 */
import { HomeComponent } from '../components/home.component';
import { EmployeeListComponent } from '../components/employee.component';
import { EmployeeDetailComponent } from '../components/employee-detail.component';
import { NotFoundComponent } from '../components/notfound.component';
import { EmployeeOverviewComponent } from '../components/employee-overview.component';
import { EmployeeProjectComponent } from '../components/employee-project.component';

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
        path: '**', component: NotFoundComponent
    }
];

export const appRoutes = RouterModule.forRoot(routing);