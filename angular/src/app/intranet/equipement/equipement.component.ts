import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { Location } from '@angular/common';

@Component({
  selector: 'app-equipement',
  templateUrl: './equipement.component.html',
  styleUrls: ['./equipement.component.css']
})

export class EquipementComponent implements OnInit {

  constructor(private router: Router, private location: Location) {}

  goBack() {
    this.location.back();
  }

  ngOnInit() {
  }

}
