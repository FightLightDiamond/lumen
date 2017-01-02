/**
 * Created by cuong on 1/2/17.
 */
import { Routes, RouterModule } from '@angular/router';
/**
 * Component
 */
import { HomeComponent } from '../components/home.component';
import { EmployeeListComponent } from '../components/employee.component';
import { NotFoundComponent } from '../components/notfound.component';

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
        path: '**', component: NotFoundComponent
    }

];

export const appRoutes = RouterModule.forRoot(routing);