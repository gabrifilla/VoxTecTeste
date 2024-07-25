import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { EmpresaListComponent } from './components/empresa-list/empresa-list.component';
import { EmpresaDetailComponent } from './components/empresa-detail/empresa-detail.component';
import { SocioListComponent } from './components/socio-list/socio-list.component';
import { SocioDetailComponent } from './components/socio-detail/socio-detail.component';

export const routes: Routes = [
  { path: '', redirectTo: '/empresas', pathMatch: 'full' },
  { path: 'empresas', component: EmpresaListComponent },
  { path: 'empresas/:id', component: EmpresaDetailComponent },
  { path: 'socios', component: SocioListComponent },
  { path: 'socios/:id', component: SocioDetailComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
