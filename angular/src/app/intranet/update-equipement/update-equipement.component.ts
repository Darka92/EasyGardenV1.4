import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Location } from '@angular/common';

import { Observable} from 'rxjs';


import { HttpClient, HttpParams } from '@angular/common/http';

@Component({
  selector: 'app-update-equipement',
  templateUrl: './update-equipement.component.html',
  styleUrls: ['./update-equipement.component.css']
})

export class UpdateEquipementComponent implements OnInit {

  statut: string;

  constructor(private http: HttpClient, private router: Router, private location: Location, private route: ActivatedRoute) {
    /*this.route.queryParams.subscribe(params => {
      this.statut = params.get('statut');*/

      /*this.statut = this.route.snapshot.paramMap.get('statut');*/
    console.log( http );
    console.log( router );
    console.log( location );
    console.log( route );

    //});
  }

  goBack() {
    this.location.back();
  }

  ngOnInit() {
    /*this.route.paramMap
      .subscribe( params => {
        let id = +params.get('statut');
        console.log('id' + id);
        console.log(params);
      });*/

    this.route.paramMap.subscribe(params => {
      this.statut = params.get('statut');
    });

    console.log(this.statut);
    console.log("ngOnInit " + this.statut);

  }
}
