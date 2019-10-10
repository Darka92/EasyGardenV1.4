import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';


/*  MES IMPORTS */
import { Erreur404Component } from './erreur404/erreur404.component';
import { ConnexionComponent } from './connexion/connexion.component';
import { InscriptionComponent } from './inscription/inscription.component';
import { FpasswordComponent } from './fpassword/fpassword.component';


const routes: Routes = [
  {path:'', redirectTo:'', component:ConnexionComponent, pathMatch:'full'},
  {path:'connexion', component:ConnexionComponent},
  {path:'inscription', component:InscriptionComponent},
  {path:'fpassword', component:FpasswordComponent},
  {path:'intranet', loadChildren:'./intranet/intranet.module#IntranetModule'},
  {path:'**', component:Erreur404Component}
];


@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})


export class AppRoutingModule { }
