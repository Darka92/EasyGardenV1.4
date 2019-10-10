import { Component, OnInit } from '@angular/core';


/*  MES IMPORTS  */

/*  ROUTES  */
import { ActivatedRoute, Router } from '@angular/router';
import { Location } from '@angular/common';  /*  Nécessaire pour la fonction goBack()  */



@Component({
  selector: 'app-update-equipement',
  templateUrl: './update-equipement.component.html',
  styleUrls: ['./update-equipement.component.css']
})



export class UpdateEquipementComponent implements OnInit {

  statut: string;

  constructor(private router: Router, private location: Location, private route: ActivatedRoute) {
  }

  goBack() {
    this.location.back();
  }

  ngOnInit() {
  }
  

}
