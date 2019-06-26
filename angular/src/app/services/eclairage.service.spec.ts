import { TestBed } from '@angular/core/testing';

import { EclairageService } from './eclairage.service';

describe('EclairageService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: EclairageService = TestBed.get(EclairageService);
    expect(service).toBeTruthy();
  });
});
