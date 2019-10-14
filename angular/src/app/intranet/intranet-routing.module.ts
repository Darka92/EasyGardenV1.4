import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';


/*  MES IMPORTS  */

/*  COMPONENT  */
import { AccueilComponent } from './accueil/accueil.component';
import { ArrosageComponent } from './arrosage/arrosage.component';
import { EclairageComponent } from './eclairage/eclairage.component';
import { BassinComponent } from './bassin/bassin.component';
import { TondeuseComponent } from './tondeuse/tondeuse.component';
import { PortailComponent } from './portail/portail.component';
import { ImgaccComponent } from './imgacc/imgacc.component';
import { ProfilComponent } from './profil/profil.component';
import { AddEquipementComponent } from './add-equipement/add-equipement.component';
import { UpdateEquipementComponent } from './update-equipement/update-equipement.component';



const routes: Routes = [
  { path: 'easy-garden', component: AccueilComponent,
    children:[
      { path:'', component: ImgaccComponent},
      { path:'arrosage', component: ArrosageComponent},
      { path:'eclairage', component: EclairageComponent},
      { path:'bassin', component: BassinComponent},
      { path:'tondeuse', component: TondeuseComponent},
      { path:'portail', component: PortailComponent},
      { path:'profil', component: ProfilComponent},
      { path:'arrosage/addequipement', component: AddEquipementComponent},
      { path:'arrosage/updateequipement/:id', component: UpdateEquipementComponent},
      { path:'eclairage/addequipement', component: AddEquipementComponent},
      { path:'eclairage/updateequipement/:id', component: UpdateEquipementComponent},
      { path:'bassin/addequipement', component: AddEquipementComponent},
      { path:'bassin/updateequipement/:id', component: UpdateEquipementComponent},
      { path:'tondeuse/addequipement', component: AddEquipementComponent},
      { path:'tondeuse/updateequipement/:id', component: UpdateEquipementComponent},
      { path:'portail/addequipement', component: AddEquipementComponent},
      { path:'portail/updateequipement/:id', component: UpdateEquipementComponent}
    ]}
];


@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})


export class IntranetRoutingModule { }
