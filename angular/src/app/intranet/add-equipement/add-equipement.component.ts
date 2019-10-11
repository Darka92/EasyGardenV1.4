import { Component, OnInit } from '@angular/core';


/*  MES IMPORTS  */

/*  ROUTES  */
import { ActivatedRoute, Router } from '@angular/router';
import { Location } from '@angular/common';  /*  Nécessaire pour la fonction goBack()  */



@Component({
  selector: 'app-add-equipement',
  templateUrl: './add-equipement.component.html',
  styleUrls: ['./add-equipement.component.css']
})



export class AddEquipementComponent implements OnInit {

  constructor(private router: Router, private location: Location, private route: ActivatedRoute) {}

  goBack() {
    this.location.back();
  }

  ngOnInit() {
  }


}